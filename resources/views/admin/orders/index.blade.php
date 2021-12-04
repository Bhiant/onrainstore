@extends('admin.layout')

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default">
					<div class="card-header card-header-border-bottom">
						<h2>Orders</h2>
					</div>
					<div class="card-body">
						@include('admin.partials.flash')
						@include('admin.orders.filter')
						<table class="table table-bordered table-stripped">
							<thead>
								<th>Order ID</th>
								<th>Status</th>
								<th>Nama Pembeli</th>
								<th>No Telp</th>
								<th>Total Belanja</th>
								<th>Nama Admin</th>
								
								<th>Action</th>
								
							</thead>
							<tbody>
								@forelse ($orders as $order)
									<tr>    
										<td>
											{{ $order->code }}<br>
											<span style="font-size: 12px; font-weight: normal"> {{\General::datetimeFormat($order->order_date) }}</span>
										</td>
										<td>{{ $order->status }}</td>
										<td>{{ $order->customer_name }}</td>
										<td>{{ $order->customer_phone }}</td>
										<td>{{\General::priceFormat($order->base_total_price) }}</td>
										<td>{{ $order->customer_admin_name }}</td>
										<td>
												<a href="{{ url('admin/orders/'. $order->id) }}" class="btn btn-info btn-sm" style="display:inline-block">show</a>
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