<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="{{ asset('public/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{url('Home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{url('Profile')}}">Profil</a>
                        </li>
                        <li>
                            <a href="{{url('PesananSaya')}}">Pesanan Saya</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$M_totalcheckout}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <div></div>

                </div>
            </nav>
        </div>
    </div>
</header>
<div class="loader loader-default" data-text="Processing ..." id="loader-obj"></div>