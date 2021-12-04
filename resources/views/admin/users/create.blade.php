@extends('admin.layout')

@section('title', 'Create')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Create User</h2>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['users.store'] ]) !!}
                        @include('admin.users.form')
                        <!-- Submit Form Button -->
                        <div class="form-footer pt-5 border-top">
                            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary"><i class='fas fa-reply'></i> Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection