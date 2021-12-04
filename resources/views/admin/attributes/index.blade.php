@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="text-center">Attribute</h3>  
      @can('add_attributes')
      <a href="{{ url('admin/attributes/create') }}" class="btn btn-primary text-right"><i class='fas fa-plus'></i>
        Tambah Data</a>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @include('admin.partials.flash')
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Code</th>
          <th>Nama</th>
          <th>Type</th>
          @can('edit_attributes')
          <th>Action</th>
          @endcan
        </tr>
        </thead>
        <tbody>
        @forelse ($attributes as $attribute)
        <tr>
            <td class="text-center">{{ $attribute->code }}</td>
            <td class="text-center">{{ $attribute->name }}</td>
            <td class="text-center">{{ $attribute->type }}</td>
            <td class="text-center">
                @can('edit_attributes')
                <a href="{{ url('admin/attributes/'. $attribute->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                @endcan
                @can('add_attributes')
                @if ($attribute->type == 'select')
                <a href="{{ url('admin/attributes/'. $attribute->id .'/options') }}" class="btn btn-success btn-sm">options</a>
                @endif
                @endcan
                @can('delete_attributes')
                {!! Form::open(['url' => 'admin/attributes/'. $attribute->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
    </div>
    <!-- /.card-body -->
  </div>
@endsection
