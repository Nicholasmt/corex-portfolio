@extends('layouts.app')
@section('contents')
@include('layouts.nav') 

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-show">
    <div class="container">
     <div class="section-title">
        <h2>MY Articles</h2>
        <p>{{ $view->title }}</p>
      </div>
      @php
         $media = App\Models\Media::where('id',$view->image)->first(); 
      @endphp
      <div class="entry-image align-wide-full d-flex align-items-center justify-content-center px-5" style="background: url({{ asset('storage/'.$media->path)}}) no-repeat center center / cover !important;height:500px;">
        <div class="p-4 bg-white position-relative rounded text-sm-center mw-xs">
            <h2 class="mb-3 font"> {{ $view->title }}</h2>
            <div class="d-flex justify-content-center"></div>
        </div>
    </div>
    <div class="container">
      <div class="">
        <p style="font-size:20px;text-justify:inter-word;text-align:justify;">
             {!! $view->content !!}
        </p>
        <p class=""> {{\Carbon\Carbon::parse($view->created_at )->format('M d, Y')}} || <span><i class="">{{ $view->author }}</i></span></p>
      </div>
    </div>
    <div class="php-email-form mt-4">
      @livewireStyles
       <livewire:blog-comments :view="$view"/>
       @livewireScripts
    </div>
  </div>
  </section>
  <!-- End Contact Section -->
  @if(!empty($setting))
    @php
      $mycolor_1 = App\Services\Hex2Rgb::hex2rgba($setting->primary_color,0.6);
      $mycolor_2 = App\Services\Hex2Rgb::hex2rgba($setting->primary_color,0.8);
    @endphp
  <style>
     .section-title h2::after{
        background: <?php echo $setting->primary_color ?> !important;
     }
     .font{
        color: <?php echo $setting->primary_color ?> !important;
     }
     .btn-primary {
      --bs-btn-color: #fff;
      --bs-btn-bg: <?php echo $setting->primary_color ?> !important;
      --bs-btn-border-color: <?php echo $setting->primary_color ?> !important;
      --bs-btn-hover-color: #fff;
      --bs-btn-hover-bg: <?php echo $mycolor_1 ?> !important;
      --bs-btn-hover-border-color: <?php echo $mycolor_1 ?> !important;
      --bs-btn-focus-shadow-rgb: 49, 132, 253;
      --bs-btn-active-color: #fff;
      --bs-btn-active-bg: <?php echo $mycolor_2 ?> !important;
      --bs-btn-active-border-color: <?php echo $mycolor_2 ?> !important;
      --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      --bs-btn-disabled-color: #fff;
      --bs-btn-disabled-bg: <?php echo $setting->secondary_color ?> !important;
      --bs-btn-disabled-border-color: <?php echo $setting->secondary_color ?> !important;
     }
   </style>
 @endif
 @endsection
 
 

