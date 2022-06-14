<head>
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
<div class="col-md-6 col-lg-7 p-b-30">
    <div class="p-l-25 p-r-30 p-lr-0-lg">
        <div class="wrap-slick3 flex-sb flex-w">
            <div class="wrap-slick3-dots"></div>
            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

            <div class="slick3 gallery-lb">
                <div class="wrap-pic-w pos-relative">
                    <img src="{{url ($MS_DetailProduct->foto) }}" alt="IMG-PRODUCT">

                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                        <i class="fa fa-expand"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-5 p-b-30">
    <div class="p-r-50 p-t-5 p-lr-0-lg">
        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
            {{$MS_DetailProduct->nama_produk}}
        </h4>

        <span class="mtext-106 cl2">
            {{$M_harga}}
        </span>
        <br>
        <span class="mtext-106 cl2">
            Stok : {{ $MS_DetailProduct->qty }}
        </span>

        <p class="stext-102 cl3 p-t-23">
            {{$MS_DetailProduct->deskripsi_produk}}
        </p>
        <form id="FormCart">
            <div class="p-t-33">
                <div class="flex-w flex-r-m p-b-10">
                    <div class="size-204 flex-w flex-m respon6-next">

                        @if($MS_DetailProduct->qty == 0)
                        @else
                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>

                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah" value="1">

                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="id" id="id" value="{{$MS_DetailProduct->id}}">

                        @if($MS_DetailProduct->qty == 0)
                        @else
                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" type="button" id="btn-InsertCart">
                            Add to cart
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src=" {{ asset('public/vendor/animsition/js/animsition.min.js')}}"></script>

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
<script>
    var LoaderJS = {
        loaderObj: $("#loader-obj"),
        show: function() {
            this.loaderObj.addClass('is-active');
        },
        hide: function() {
            this.loaderObj.removeClass('is-active');
        },
        setText: function(strLoading) {
            this.loaderObj.attr('data-text', strLoading);
        }
    };
</script>
<!-- <script src="{{ asset('public/js/main.js')}}"></script> -->
<script src="{{ asset('public/js/add-cart.js') }}"></script>