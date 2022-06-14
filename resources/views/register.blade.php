<!doctype html>
<html lang="en">

<head>
    <title>Register My Online Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('public/login/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/css/css-loader/css-loader.css') }}">
</head>
<div class="loader loader-default" data-text="Processing ..." id="loader-obj"></div>

<body class="img js-fullheight" style="background-image: url(public/login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Register My Online Store</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form id="FormRegister">
                            <div class="form-group">
                                <input type="text" class="form-control" name="namadepan" id="namadepan" placeholder="Nama Depan" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="namatengah" id="namatengah" placeholder="Nama Tengah">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="namabelakang" id="namabelakang" placeholder="Nama Belakang">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button class="form-control btn btn-primary submit px-3" id="btn-save" type="button">Register</button>
                            </div>
                        </form>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-md-right">
                                <a href="{{ url('Login') }}" class="form-control btn btn-primary submit px-3">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('public/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/login/js/popper.js') }}"></script>
    <script src="{{ asset('public/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/login/js/main.js') }}"></script>
    <script src="{{ asset('public/js/register.js') }}"></script>
    <script src="{{ asset('public/js/sweetalert/sweetalert.min.js') }}"></script>
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