@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2 class="text-center">Users</h2>
                        @can('add_users')
                        <p>
                            <a href="{{ url('admin/users/create') }}" class="btn btn-outline-primary"><i class='fas fa-plus'></i> Tambah Data</a>
                        </div>
                        @endcan
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                @can('edit_users')
                                <th>Action</th>
                                @endcan
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>    
                                        <td>{{ $user->admin_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->implode('name', ', ') }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                        @if (!$user->hasRole('Admin'))
                                            @can('edit_users')
                                                <a href="{{ url('admin/users/'. $user->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            @endcan

                                            @can('delete_users')
                                                {!! Form::open(['url' => 'admin/users/'. $user->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection