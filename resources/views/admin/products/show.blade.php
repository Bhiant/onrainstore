@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-primary">
                        <div class="card-header text-center">
                            <h3 class="title">Copy Produk</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <label>SKU</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $product->sku}}" id="copySKU" readonly>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-copy" onclick="copysku()"><i class="far fa-copy"></i></button>
                            </span>
                        </div>
                        <label>Nama Produk</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="BAYAR DITEMPAT {{ $product->name }}" id="copyNAME" readonly>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-copy"><i class="far fa-copy" onclick="copyname()"></i></button>
                            </span>
                        </div>
                        <label>Harga Produk</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $product->price }}" id="copyHARGA" readonly>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-copy"><i class="far fa-copy" onclick="copyharga()"></i></button>
                            </span>
                        </div>
                        <label>Deskripsi Produk</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $product->description }}" id="copyDESC" readonly>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-copy"><i class="far fa-copy" onclick="copydesc()"></i></button>
                            </span>
                        </div>
                        <label>Gambar Produk</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Silahkan cari folder yg sesuai dengan SKU" readonly>
                            <span class="input-group-append">
                                <a role="button" class="btn btn-info btn-copy" href="https://drive.google.com/drive/u/0/folders/1HrxvcLScPPakonLYTfdoah9oajvF7sAh" target="_blank"><i class="fas fa-download"></i></a>
                            </span>
                        </div>
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary btn-default"><i class='fas fa-reply'></i> Kembali</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection