<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Online Store</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('public/images/icons/favicon.png') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/linearicons-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/animsition/css/animsition.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/slick/slick.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/MagnificPopup/magnific-popup.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="animsition">

    <!-- Header -->
    @include('layout.header')

    @yield('content')
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                @foreach ($arrCart as $item)
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ url($item[1]) }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $item[0] }}
                            </a>

                            <span class="header-cart-item-info">
                                {{ $item[4] }} X {{ $item[2] }}
                            </span>
                        </div>
                    </li>
                </ul>
                @endforeach
                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: {{$M_totalharga}}
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{url('Cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart or Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <!-- footer -->
    @include('layout.footer')


    <script src="{{ asset('public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

    <script src="{{ asset('public/vendor/animsition/js/animsition.min.js')}}"></script>

    <script src="{{ asset('public/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('public/vendor/select2/select2.min.js')}}"></script>

    <script src="{{ asset('public/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('public/vendor/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{ asset('public/vendor/slick/slick.min.js')}}"></script>
    <script src="{{ asset('public/js/slick-custom.js')}}"></script>

    <script src="{{ asset('public/vendor/parallax100/parallax100.js')}}"></script>


    <script src="{{ asset('public/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{ asset('public/vendor/isotope/isotope.pkgd.min.js')}}"></script>

    <script src="{{ asset('public/vendor/sweetalert/sweetalert.min.js')}}"></script>


</body>

</html>