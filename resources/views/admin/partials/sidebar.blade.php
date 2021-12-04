<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link text-center">
      {{-- <img src="{{ URL::asset('admin/assets/dist/img/Logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Onrain Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('admin/assets/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->admin_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link">
              <i class="nav-icon 	fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('products') }}" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Ecommerce
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon fas fas fa-archive"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            @can('view_products')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/products') }}" class="nav-link">
                  <i class="fas fa-cubes nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              @endcan
              @can('view_categories')
              <li class="nav-item">
                <a href="{{ url('admin/categories') }}" class="nav-link">
                  <i class="fas fa-tags nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              @endcan
              @can('view_attributes')
              <li class="nav-item">
                <a href="{{ url('admin/attributes') }}" class="nav-link">
                  <i class="fas fa-cogs nav-icon"></i>
                  <p>Attribute</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @can('view_orders')
          <li class="nav-item">
            <a href="{{ url('admin/orders')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          @endcan
          @can('delete_orders')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Orderan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/orders/trashed')}}" class="nav-link">
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Trashed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/shipments')}}" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Shipments</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users &amp; Roles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            @can('view_users')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/users')}}" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              @endcan
              @can('view_roles')
              <li class="nav-item">
                <a href="{{ url('admin/roles')}}" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>