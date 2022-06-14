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
        <div class="row">
            <div class="section-title"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 20%;">Nama Parameter</th>
                        <th>Isi Parameter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Depan</td>
                        <td>{{ $GetUser->namadepan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Tengah</td>
                        @if($GetUser->namatengah == '')
                        <td>-</td>
                        @else
                        <td>{{ $GetUser->namatengah }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Nama Belakang</td>

                        <td>{{ $GetUser->namabelakang }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $GetUser->email }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        @if($GetAlamat == '')
                        <td>-</td>
                        @else
                        <td>{{ $GetAlamat->alamat }}</td>
                        @endif
                    </tr>
                </tbody>

            </table>
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