@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Trashed Orders</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        @include('admin.orders.filter')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Order ID</th>
                                <th>Total</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Admin</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>    
                                        <td>
                                            {{ $order->code }}<br>
                                            <span style="font-size: 12px; font-weight: normal"> {{\General::datetimeFormat($order->order_date) }}</span>
                                        </td>
                                        <td>{{\General::priceFormat($order->base_total_price) }}</td>
                                        <td>
                                            {{ $order->customer_name }}<br>
                                            <span style="font-size: 12px; font-weight: normal"> {{ $order->customer_phone }}</span>
                                        </td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->customer_admin_name }}</td>
                                        <td>
                                            @can('edit_orders')
                                                <a href="{{ url('admin/orders/'. $order->id) }}" class="btn btn-info btn-sm">show</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection