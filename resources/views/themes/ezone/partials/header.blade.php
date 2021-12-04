<!-- header start -->
<header>
    <div class="header-top-furniture wrapper-padding-2 res-header-sm">
        <div class="container-fluid">
            <div class="header-bottom-wrapper">
                <div class="logo-2 furniture-logo ptb-30">
                    <a href="/products">
                        <img src="{{ asset('themes/ezone/assets/img/logo/2.png') }}" alt="">
                    </a>
                </div>
                <div class="menu-style-2 furniture-menu menu-hover">
                    <nav>
                        <ul>
                            {{-- <li><a href="/">home</a></li> --}}
                            <li><a href="{{ url('admin/dashboard') }}">admin</a></li>
                            <li><a href="{{ url('products') }}">Product</a></li>
                        </ul>
                    </nav>
                </div>
                @include('themes.ezone.partials.mini_cart')
            </div>
            <div class="row">
                <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="{{ url('admin/products') }}">admin</a></li>
                                <li><a href="{{ url('products') }}">Product</a></li>
                            </ul>
                        </nav>							
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
        <div class="container-fluid">
            <div class="furniture-bottom-wrapper">
                <div class="furniture-login">
                    <ul>
						@guest
							<li>Get Access: <a href="{{ url('login') }}">Login</a></li>
							<li><a href="{{ url('register') }}"></a></li>
						@else
							<li>Hello: <a href="{{ url('profile') }}">{{ Auth::user()->admin_name }}</a></li>
							{{-- <a href="{{ route('logout') }}"
								onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form> --}}
						@endguest
					</ul>
                </div>
                <div class="furniture-search">
                    <form action="{{ url('products') }}" method="GET">
                        <input placeholder="Pencarian" type="text" name="q" value="{{ isset($q) ? $q : null }}">
                        <button>
                            <i class="ti-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->