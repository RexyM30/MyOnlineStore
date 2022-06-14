<!DOCTYPE html>
<html lang="en">

@include('layout.css')

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
    
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>
    <!-- Shoping Cart -->
    <!-- <form class="bg0 p-t-75 p-b-85"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <form id="frmupdate-cart">
                        <div class="wrap-table-shopping-cart">

                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5"></th>
                                </tr>
                                @foreach ($arrCart as $item)
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{ url($item[1]) }}" alt="IMG">

                                        </div>
                                    </td>
                                    <td class="column-2"> {{ $item[0] }} <input type="hidden" value="{{$item[5]}}" name="ID[]"></td>
                                    <td class="column-3">{{ $item[2] }} <input type="hidden" value="{{$item[6]}}" name="harga[]" id="harga"></td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-number-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah[]" value="{{ $item[4] }}" id="number">

                                            <div class="btn-number-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <button class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" type="button" id="btn-updateCart">
                                Update Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>



            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <form id="frm-order">
                    @foreach ($arrCart as $item)
                    <input type="hidden" value="{{$item[5]}}" name="ID[]">
                    <input type="hidden" name="jumlah[]" value="{{ $item[6] }}" id="number">
                    @endforeach
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    {{$M_totalharga}}

                                    <input type="hidden" value="{{$totalharga}}" name="totalharga">
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Alamat :
                                </span>
                            </div>
                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    @if($GetAlamat == '')
                                    -
                                    @else
                                    {{ $GetAlamat->alamat }}
                                    @endif
                                </span>
                            </div>

                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Ongkir :
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    Rp. 10.000
                                    <input type="hidden" value="10000" name="ongkir">
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    {{$Totaldibayar}}
                                    <input type="hidden" value="{{$M_totaldibayar}}" name="Totaldibayar">
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="button" id="btn-order">
                            Order
                        </button>
                    </div>
                </form>
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

    <script src="{{ asset('public/js/whislist.js')}}"></script>
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
</body>

</html>