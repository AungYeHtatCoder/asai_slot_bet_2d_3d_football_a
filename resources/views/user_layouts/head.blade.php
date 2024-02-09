<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delight 2D | 3D | Slot</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('user_app/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_app/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @yield('style')
</head>
<body>
    <!-- preloader section -->
    <div class="container-fluid allBgColor d-none">
        <div class="row">
            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 col-12">
                <div id="preloader">
                    <div class="d-flex justify-content-end">
                        <div class="spinner-border text-white mt-3" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader section -->
