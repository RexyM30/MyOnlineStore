<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
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



    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(public/images/slide-01.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Women Collection 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(public/images/slide-02.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men New-Season
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(public/images/slide-03.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men Collection 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    New arrivals
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @foreach ($MSCATEGORY as $item)
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

                    <div class="block1 wrap-pic-w">
                        <img src="{{ url($item->foto) }}" alt="IMG-BANNER">

                        <a href="" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    {{ $item->nama_kategori }}
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".2">
                        Women
                    </button>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".1">
                        Men
                    </button>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($MS_PRODUCT as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->kategori_id }}">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ url($item->foto) }}" alt="IMG-PRODUCT">

                            <!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a> -->


                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" onclick="view(' {{ $item->id }} ')">
                                Quick View
                            </a>
                            <!-- <button class="btn btn-info btn-sm" id="view" onclick="view(' . $value->ID . ')"><i class="fas fa-info-circle"></i>Shop Now</button> -->
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $item->nama_produk}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{ number_format($item->harga) }}
                                </span>
                            </div>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- modal -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-view">
        <div class="modal-dialog" role="document" style="max-width:1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    @include('layout.footer')


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    <!-- <div class="modal" tabindex="-1" role="dialog" id="modal-view">
        <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
            <div class="overlay-modal1 js-hide-modal1"></div>
            <div class="container">
                <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                    <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                        <img src="{{ asset('public/images/icons/icon-close.png') }}" alt="CLOSE">
                    </button>
                    <div class="row">

                    </div>

                </div>
            </div>
        </div>
    </div> -->



    <script src="{{ asset('public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

    <script src="{{ asset('public/vendor/animsition/js/animsition.min.js')}}"></script>

    <script src="{{ asset('public/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('public/vendor/select2/select2.min.js')}}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>

    <script src="{{ asset('public/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('public/vendor/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{ asset('public/vendor/slick/slick.min.js')}}"></script>
    <script src="{{ asset('public/js/slick-custom.js')}}"></script>

    <script src="{{ asset('public/vendor/parallax100/parallax100.js')}}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>

    <script src="{{ asset('public/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>

    <script src="{{ asset('public/vendor/isotope/isotope.pkgd.min.js')}}"></script>

    <script src="{{ asset('public/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });
        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>

    <script src="{{ asset('public/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>

    <script src="{{ asset('public/js/main.js')}}"></script>

</body>

</html>