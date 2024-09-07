<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nicholas Tochukwu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  @php
     if(!empty($setting)) {
       $media = App\Models\Media::where('id',$setting->favicon)->first();
     }
  @endphp
  <link href="@if(!empty($setting))  {{ asset('storage/'.$media->path)}} @else {{ asset('assets/imgs/sample-favicon.png')}} @endif" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}"   rel="stylesheet">
  @section('head')
  @show
</head>

<body>

@yield('contents')

@include('layouts.footer')
<!-- JS Files -->
 
<script src="{{ asset('assets/js/jquery-3.7.0.min.js')}}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>

@section('script')
@show

</body>
</html>