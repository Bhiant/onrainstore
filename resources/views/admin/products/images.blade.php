@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            @include('admin.products.product_menus')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2 class="text-center">Gambar Produk</h2>
                        <div class="text-right">
                        <a href="{{ url('admin/products/'.$productID.'/add-image') }}" class="btn btn-primary">Tambah</a>
                        </div>
                </div>
                <div class="card-body">
                    
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Gambar</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($productImages as $image)
                                <tr>
                                    <td><img src="{{ asset('storage/'.$image->small) }}" style="width:100px"/></td>
                                    <td>{{ $image->created_at }}</td>
                                    <td>
                                        {!! Form::open(['url' => 'admin/products/images/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <td colspan="4">Tidak ada data</td>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection