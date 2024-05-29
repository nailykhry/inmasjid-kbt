<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('assets/images/inmasjid.png') }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>inMasjid | @yield('title')</title>

        <!-- Bootstrap core CSS -->
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <!-- <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="{{ asset('assets/jquery-3.7.1.min.js') }}"></script>
        <style>
            body {
                background: #F9F9F9;
            }

            .btn-login {
                border: 2px solid black;
                border-radius: 12px;
                box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 1);
                -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 1);
                -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 1);
            }

            .btn-register {
                background: #FF6D2C;
                color: #FFF;
                border: 2px solid black;
                border-radius: 12px;
                box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 1);
                -webkit-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 1);
                -moz-box-shadow: 3px 3px 0px 0px rgba(0, 0, 0, 1);
            }

            .btn-register:hover {
                background: #212529;
                color: #FFF;
                border: 2px solid black;
            }
        </style>
    </head>

    @yield('body')
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
</html>
