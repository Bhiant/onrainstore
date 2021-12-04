@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="text-center">Kategori</h3><br>
      @can('add_categories')
      <a href="{{ url('admin/categories/create') }}" class="btn btn-primary text-right"><i class='fas fa-plus'></i>
        Tambah Data</a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @include('admin.partials.flash')
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nama Kategori</th>
          <th>Slug</th>
          <th>Parent(s)</th>
          @can('edit_categories')
          <th>Action</th>
          @endcan
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <td>{{ $category->slug }}</td>
          <td>{{ $category->parent ? $category->parent->name : '---' }}</td>
          <td>
            @can('edit_categories')
              <a href="{{ url('admin/categories/'. $category->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
            @endcan
            @can('delete_categories')
            {!! Form::open(['url' => 'admin/categories/'. $category->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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