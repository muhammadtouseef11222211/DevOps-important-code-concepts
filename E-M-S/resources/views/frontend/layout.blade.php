<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    {{-- FAVICON --}}
    <link href="{{ asset('favicon.png') }}" rel="icon">

    <!-- Bootstrap CSS File Link -->
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">

    <!-- FontAwesome Icons CSS File -->
    <link rel="stylesheet" href="{{asset('/frontend/fonts-6/css/all.css')}}">

    <!-- Custom Styling  -->
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
</head>

<body>
    @include('frontend.header')
    @yield('content')
    @include('frontend.footer')
    <!-- JS LINK -->
    <script src="{{asset('/frontend/js/index.js')}}"></script>
    <!-- Bootstrap JS File Link -->
    
    <script src="{{asset('/frontend/js/jquery.slim.min.js')}}"></script>
    
    <script src="{{asset('/frontend/js/dist_umd_popper.min.js')}}"></script> 
    
   <script src="{{asset('/frontend/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>