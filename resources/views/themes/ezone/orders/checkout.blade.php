@extends('themes.ezone.layout')

@section('content')
	<!-- checkout-area start -->
	<div class="checkout-area ptb-100">
		<div class="container">
			@include('admin.partials.flash', ['$errors' => $errors])

			{!! Form::model($user, ['url' => 'orders/checkout']) !!}
			<div class="row">
				<div class="col-lg-6 col-md-12 col-12">
					<div class="checkbox-form">						
						<h3>Detail Alamat</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Nama Admin</span></label>										
									{!! Form::text('admin_name', null, ['readonly']) !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Nama Pelanggan<span class="required">*</span></label>
									{!! Form::text('customer_name') !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Alamat Lengkap <span class="required">*</span></label>
									{!! Form::text('alamat', null, ['required' => true, 'placeholder' => 'Cth. RT/RW dan nama jalan']) !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Provinsi<span class="required">*</span></label>
									{!! Form::text('province',null, ['placeholder' => '', 'required' => true]) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Kabupaten/Kota<span class="required">*</span></label>
									{!! Form::text('city', null, ['placeholder' => '', 'required' => true])!!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Kecamatan <span class="required">*</span></label>										
									{!! Form::text('kecamatan', null, ['required' => true]) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>No Telp/WA  <span class="required">*</span></label>										
									{!! Form::text('phone', null, ['required' => true, 'placeholder' => 'Cth. 08xxxxxxxxxx']) !!}
								</div>
							</div>						
						</div>
						<div class="different-address">
							<div id="ship-box-info">					
							</div>
							<div class="order-notes">
								<div class="checkout-form-list mrg-nn">
									<label>Catatan Pembelian</label>
									{!! Form::textarea('note', null, ['cols' => 30, 'rows' => 10,'placeholder' => 'Catatan Pembelian.']) !!}
								</div>									
							</div>
						</div>													
					</div>
				</div>	
				<div class="col-lg-6 col-md-12 col-12">
					<div class="your-order">
						<h3>Orderan</h3>
						<div class="your-order-table table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-name">Produk</th>
										<th class="product-total">Total</th>
									</tr>							
								</thead>
								<tbody>
									@forelse ($items as $item)
										@php
											$product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
										@endphp
										<tr class="cart_item">
											<td class="product-name">
												{{ $item->name }}	<strong class="product-quantity"> × {{ $item->quantity }}</strong>
											</td>
											<td class="product-total">
												<span class="amount">{{ number_format(\Cart::get($item->id)->getPriceSum()) }}</span>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="2">The cart is empty! </td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
									<tr class="cart-subtotal">
										<th>Subtotal</th>
										<td><span class="amount">{{ number_format(\Cart::getSubTotal()) }}</span></td>
									</tr>
									<tr class="cart-subtotal">
										<th>Berat Barang :</th>
										<td>{{ $totalWeight }} kg</td>
									</tr>
									<tr class="order-total">
										<th>Order Total</th>
										<td><strong><span class="total-amount">{{ number_format(\Cart::getTotal()) }}</span></strong>
										</td>
									</tr>								
								</tfoot>
							</table>
						</div>
						<div class="payment-method">
							<div class="payment-accordion">
								<div class="order-button-payment">
									<input type="submit" value="Lanjutkan" />
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<!-- checkout-area end -->	
@endsection