<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    @section('meta')
        <title>{{setting('site.title')}}</title>
        <meta name="description" content="{{setting('site.description')}}">
        <meta name="keywords" content="{{setting('site.keywords')}}">
    @show
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/'.setting('site.seo_site_logo'))}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">

    <!-- ==== STYLE ===== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
{{--section header--}}
@include('frontend.layouts.header')
{{--end section--}}

{{--section nav--}}
@include('frontend.layouts.nav')
{{--end section--}}
@if(session('alert'))
    <div class="alert alert-info alert-dismissible fade show pull-right">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Info!</strong> {{session('message')}}
    </div>
@endif
{{--section user_header--}}
@include('frontend.layouts.user_header')
{{--end section--}}


@yield('content')


{{--section footer--}}
@include('frontend.layouts.footer')
{{--end section--}}


<!-- Scripts -->
@section('script')
    <script src="https://unpkg.com/tween.js@16.3.4"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
            integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="{{asset('js/init.js')}}"></script>

@show

</body>
</html>
