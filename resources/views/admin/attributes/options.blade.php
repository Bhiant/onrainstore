@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-5">
                    @include('admin.attributes.option_form')
            </div>
            <div class="col-lg-7">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Options dari : {{ $attribute->name }}</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th class="text-center">Nama</th>
                                <th style="width:30%" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($attribute->attributeOptions as $option)
                                    <tr>    
                                        <td class="text-center">{{ $option->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/attributes/options/'. $option->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            {!! Form::open(['url' => 'admin/attributes/options/'. $option->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection