<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> @if(!empty($setting)) {{ $setting->full_name }} @else MY NAME HERE @endif</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  @php
     if(!empty($setting)) {
       $media = App\Models\Media::where('id',$setting->favicon)->first();
     }
    $default_font_url = 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i';
  @endphp
  <link href="@if(!empty($setting))  {{ asset('storage/'.$media->path)}} @else {{ asset('assets/imgs/favicon.png')}} @endif" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  @if(!empty($setting))
    <link href="{{ $setting->font_url !== null ? $setting->font_url : $default_font_url }}" rel="stylesheet">
  @else
    <link href="{{ $default_font_url }}" rel="stylesheet">
  @endif
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

@if(!empty($setting))
 @php
    $media = App\Models\Media::where('id',$setting->background_image)->first();
    $bg = 'storage/'.$media->path;
 @endphp
 {{-- check for font family --}}
  @if($setting->font_family !== null)
  <style>
     h1,h2,h3,h4,h5,h6 {
       font-family: <?php echo $setting->font_family ?> !important;
    }
    #header h1 {
      font-family: <?php echo $setting->font_family ?> !important;
    }
    .navbar a,
    .navbar a:focus{
      font-family: <?php echo $setting->font_family ?> !important;
    }
    .section-title h2{
      font-family: <?php echo $setting->font_family ?> !important;
    }
    .section-title p{
      font-family: <?php echo $setting->font_family ?> !important;
    }
    .counts .count-box p{
      font-family: <?php echo $setting->font_family ?> !important;
    }
    .skills .progress .skill{
      font-family: <?php echo $setting->font_family ?> !important;
    }
    .resume .resume-item h4{
      font-family: <?php echo $setting->font_family ?> !important;
    }
    body{
      font-family: <?php echo $setting->font_family ?> !important;
    }
  </style>
  @endif

 <style>
   body::before{
       background: #040404 url({{ $bg }}) top right no-repeat !important;
     }
 </style>
@endif
</body>
</html>