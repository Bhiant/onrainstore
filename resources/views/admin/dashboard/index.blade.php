@extends('admin.layout')

@section('content')
<div class="container text-center">
    <div class="jumbotron bg-success text-white">
        <h1 class="display-4">Selamat Datang, "{{ Auth::user()->admin_name }}"</h1>
        {{-- <hr class="my-4">
        <p class="lead"> Jika ingin mengcopy atau download gambar untuk upload, silahkan klik di bawah ini <b></b> </p>
        <a class="btn btn-primary btn-lg" href="https://docs.google.com/spreadsheets/d/1DqelWCfSf6OAvJmysROYNxcTOv6DCjl60EiJbWrknP0/edit#gid=132866521" role="button">Copy barang</a>
        <a class="btn btn-danger btn-lg" href="https://drive.google.com/drive/u/0/folders/1HrxvcLScPPakonLYTfdoah9oajvF7sAh" role="button">download gambar</a> --}}
    </div>
</div>
@endsection