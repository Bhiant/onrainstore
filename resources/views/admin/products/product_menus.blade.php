<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Menu Produk</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a class="nav-link btn btn-primary" href="{{ url('admin/products/'. $productID .'/edit') }}">Product Detail</a>
            <br><a class="nav-link btn btn-secondary" href="{{ url('admin/products/'. $productID .'/images') }}">Gambar Product</a>
        </nav>
    </div>
</div>