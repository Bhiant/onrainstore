@extends('admin.layout')

@section('content')
    
@php
    $formTitle = !empty($order) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2 class="text-center">{{ $formTitle }} Order</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                        {!! Form::model($order, ['url' => ['admin/orders', $order->id], 'method' => 'PUT']) !!}
                        {!! Form::open(['url' => 'admin/orders']) !!}
                        <div class="form-group">
                            {!! Form::label('customer_name', 'Nama Pelanggan') !!}
                            {!! Form::text('customer_name', null, ['class' => 'form-control', 'placeholder' => 'Nama Pelanggan']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('customer_phone', 'No Telp') !!}
                            {!! Form::text('customer_phone', null, ['class' => 'form-control', 'placeholder' => 'No Telp']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('customer_alamat', 'Alamat Lengkap') !!}
                            {!! Form::text('customer_alamat', null, ['class' => 'form-control', 'placeholder' => 'Alamat Lengkap']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('customer_kecamatan', 'Kecamatan') !!}
                            {!! Form::text('customer_kecamatan', null, ['class' => 'form-control', 'placeholder' => 'Kecamatan']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('customer_city', 'Kabupaten/Kota') !!}
                            {!! Form::text('customer_city', null, ['class' => 'form-control', 'placeholder' => 'Kabupaten/Kota']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('customer_province', 'Provinsi') !!}
                            {!! Form::text('customer_province', null, ['class' => 'form-control', 'placeholder' => 'Provinsi']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', $statuses , null, ['class' => 'form-control', 'placeholder' => '-- Set Status --']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resi', 'Resi/AWB') !!}
                            {!! Form::text('resi', null, ['class' => 'form-control', 'placeholder' => 'Resi/AWB']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/orders/'. $order->id) }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection