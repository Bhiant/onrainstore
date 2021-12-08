<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipment;
use App\Models\ProductInventory;

class OrderController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }

    public function checkout()
    {
        if (\Cart::isEmpty()) {
            return redirect('carts');
        }

        $items = \Cart::getContent();
        $this->data['items'] = $items;
        $this->data['totalWeight'] = $this->getTotalWeight() / 1000;

        $this->data['user'] = \Auth::user();



        return $this->loadTheme('orders.checkout', $this->data);
    }

    private function getTotalWeight()
    {
        if (\Cart::isEmpty()) {
            return 0;
        }

        $totalWeight = 0;
        $items = \Cart::getContent();

        foreach ($items as $item) {
            $totalWeight += ($item->quantity * $item->associatedModel->weight);
        }

        return $totalWeight;
    }

    // public function setShipping(Request $request)
    // {
    //     $data['total'] = number_format(\Cart::getTotal());

    //     $condition = new \Darryldecode\Cart\CartCondition(array(
    //         'name' => 'ongkir',
    //         'type' => 'shipping',
    //         'target' => 'total',
    //         'value' => '+' . 10000,
    //     ));

    //     \Cart::condition($condition);
    // }

    public function doCheckout(OrderRequest $request)
    {
        $params = $request->except('_token');

        $order = \DB::transaction(function () use ($params) {
            $order = $this->_saveOrder($params);
            $this->_saveOrderItems($order);
            $this->_saveShipment($order, $params);
            return $order;
        });

        if ($order) {
            \Cart::clear();

            \Session::flash('success', 'Terima Kasih, Pesanan akan diproses!');
            return redirect('orders/received/' . $order->id);
        }

        return redirect('orders/checkout');
    }

    private function _saveorder($params)
    {
        $baseTotalPrice = \Cart::getSubTotal();
        $orderDate = date('Y-m-d H:i:s');

        $orderParams = [
            'user_id' => \Auth::user()->id,
            'code' => Order::generateCode(),
            'status' => Order::PENDING,
            'order_date' => $orderDate,
            'payment_status' => Order::UNPAID,
            'base_total_price' => $baseTotalPrice,
            'note' => $params['note'],
            'customer_admin_name' => $params['admin_name'],
            'customer_name' => $params['customer_name'],
            'customer_phone' => $params['phone'],
            'customer_alamat' => $params['alamat'],
            'customer_kecamatan' => $params['kecamatan'],
            'customer_city' => $params['city'],
            'customer_province' => $params['province'],
        ];
        return Order::create($orderParams);
    }

    private function _saveOrderItems($order)
    {
        $cartItems = \Cart::getContent();

        if ($order && $cartItems) {
            foreach ($cartItems as $item) {
                $itemBaseTotal = $item->quantity * $item->price;

                $product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;

                $orderItemParams = [
                    'order_id' => $order->id,
                    'product_id' => $item->associatedModel->id,
                    'qty' => $item->quantity,
                    'base_price' => $item->price,
                    'base_total' => $itemBaseTotal,
                    'sku' => $item->associatedModel->sku,
                    'type' => $product->type,
                    'name' => $item->name,
                    'weight' => $item->associatedModel->weight,
                    'attributes' => json_encode($item->attributes),
                ];

                $orderItem = OrderItem::create($orderItemParams);

                if ($orderItem) {
                    ProductInventory::reduceStock($orderItem->product_id, $orderItem->qty);
                }
            }
        }
    }

    /**
     * Save shipment data
     *
     * @param Order $order  order object
     * @param array $params checkout params
     *
     * @return void
     */
    private function _saveShipment($order, $params)
    {
        $shippingAdminName = isset($params['ship_to']) ? $params['shipping_admin_name'] : $params['admin_name'];
        $shippingCustomerName = isset($params['ship_to']) ? $params['shipping_customer_name'] : $params['customer_name'];
        $shippingPhone = isset($params['ship_to']) ? $params['shipping_phone'] : $params['phone'];
        $shippingKecamatan = isset($params['ship_to']) ? $params['shipping_kecamatan'] : $params['kecamatan'];
        $shippingCity = isset($params['ship_to']) ? $params['shipping_city'] : $params['city'];
        $shippingProvince = isset($params['ship_to']) ? $params['shipping_province'] : $params['province'];

        $shipmentParams = [
            'user_id' => \Auth::user()->id,
            'order_id' => $order->id,
            'status' => Shipment::PENDING,
            'total_qty' => \Cart::getTotalQuantity(),
            'total_weight' => $this->getTotalWeight(),
            'admin_name' => $shippingAdminName,
            'customer_name' => $shippingCustomerName,
            'phone' => $shippingPhone,
            'kecamatan' => $shippingKecamatan,
            'city' => $shippingCity,
            'province' => $shippingProvince,
        ];

        Shipment::create($shipmentParams);
    }

    public function received($orderId)
    {
        $this->data['order'] = Order::where('id', $orderId)
            ->where('user_id', \Auth::user()->id)
            ->firstOrFail();

        return $this->loadTheme('orders/received', $this->data);
    }
}
