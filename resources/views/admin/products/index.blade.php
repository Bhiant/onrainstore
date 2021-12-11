@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="text-center">Product</h3><br><br>
      @can('add_products')
      <a href="{{  URL('admin/products/create') }}" class="btn btn-outline-primary"><i class='fas fa-plus'></i> Tambah Data</a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @include('admin.partials.flash')
        @include('admin.products.filter')
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>SKU</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->name }}</td>
            <td>Rp. {{ number_format($product->price) }}</td>
            <td>{{ $product->statusLabel() }}</td>
            <td>
                <a href="{{ url('admin/products/'.$product->id)}} " class="bt btn-primary btn-sm">Show</a>
                @can('edit_products')
                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                @endcan
                @can('delete_products')
                {!! Form::open(['url' => 'admin/products/'.$product->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
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
      {{ $products->links() }}
    </div>
    <!-- /.card-body -->
  </div>
@endsection