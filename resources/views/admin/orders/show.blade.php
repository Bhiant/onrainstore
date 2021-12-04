@extends('admin.layout')

@section('content')
<div class="content">
	<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
		<div class="d-flex justify-content-between">
			<h2 class="text-dark font-weight-medium">Order ID #{{ $order->code }}</h2>
			<h2 class="text-dark font-weight-medium">Status # <strong class="bg-warning">{{ $order->status }}</strong></h2>
		</div>
		<div class="row pt-5">
			<div class="col-xl-6 col-lg-6">
				<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Pengiriman</p>
				<address>
					{{ $order->customer_name }}
					<br> {{ $order->customer_alamat }}
					<br> Kecamatan : {{ $order->customer_kecamatan }}
					<br> Kabupaten/Kota : {{ $order->customer_city }}
					<br> Provinsi : {{ $order->customer_province }}
					<br> Phone: {{ $order->customer_phone }}
				</address>
			</div>
			<div class="col-xl-6 col-lg-6">
				<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
				<address>
					ID: <span class="text-dark">#{{ $order->code }}</span>
					<br> {{ \General::datetimeFormat($order->order_date) }}
					<br> Status: {{ $order->status }}
				</address>
			</div>
		</div>
		<table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th>#</th>
					<th>Item</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Harga Barang</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($order->orderItems as $item)
					<tr>
						<td>{{ $item->sku }}</td>
						<td>{{ $item->name }}</td>
						<td>{!! \General::showAttributes($item->attributes) !!}</td>
						<td>{{ $item->qty }}</td>
						<td>{{ \General::priceFormat($item->base_price) }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="6">Order item not found!</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		<div class="row justify-content-end">
			<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto bg-warning">
				<ul class="list-unstyled mt-4">
					<li class="mid pb-3 text-dark">Subtotal
						<span class="d-inline-block float-right text-default"><strong>{{ \General::priceFormat($order->base_total_price) }}</strong></span>
					</li>
				</ul>
			</div>
		</div>
		<a href="{{ url('admin/orders') }}" class="btn btn-secondary">Back</a>
		@can('edit_orders')
		<a href="{{ url('admin/orders/'.$order->id.'/edit') }}" class="btn btn-warning">Edit</a>
		@endcan
		@can('delete_orders')
		{!! Form::open(['url' => 'admin/orders/'.$order->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
		{!! Form::hidden('_method', 'DELETE') !!}
		{!! Form::submit('hapus', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
		@endcan
	</div>
</div>
@endsection
