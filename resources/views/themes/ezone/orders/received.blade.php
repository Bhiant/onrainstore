@extends('themes.ezone.layout')

@section('content')
	<!-- checkout-area start -->
	<div class="cart-main-area  ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@include('admin.partials.flash', ['$errors' => $errors])
					<h1 class="cart-heading">Your Order:</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								Admin : {{ $order->customer_admin_name }} 
                                <br> Pelanggan : {{ $order->customer_name }}
								<br> Alamat : {{ $order->customer_alamat }}
								<br> Kecamatan {{ $order->customer_kecamatan }}
								<br> Kabupaten {{ $order->customer_city }}
								<br> Provinsi {{ $order->customer_province }}
								<br> Phone: {{ $order->customer_phone }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								Invoice ID:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ \General::datetimeFormat($order->order_date) }}
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Description</th>
									<th>Quantity</th>
									<th>Unit Cost</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->sku }}</td>
										<td>{{ $item->name }}</td>
										<td>{!! \General::showAttributes($item->attributes) !!}</td>
										<td>{{ $item->qty }}</td>
										<td>{{ \General::priceFormat($item->base_total) }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									<li> Subtotal
										<span>{{ \General::priceFormat($order->base_total_price) }}</span>
									</li>
								</ul>
								{{-- <a href="#">Proceed to payment</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection