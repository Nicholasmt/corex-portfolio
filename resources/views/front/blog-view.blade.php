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
      <div class="entry-image align-wide-full min-vh-50 d-flex align-items-center justify-content-center px-5" style="background: url({{ asset('storage/'.$media->path)}}) no-repeat center center / cover !important;">
        <div class="p-4 bg-white position-relative rounded text-sm-center mw-xs">
            <h2 class="mb-3 color"> {{ $view->title }}</h2>
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
      <div class="row">Your Comment</h3>
        <div class="form-group mt-3">
          <input type="text" class="form-control" wire:model="name" id="name" placeholder="Full Name">
          @error('name') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" wire:model="message" rows="5" placeholder="Message"></textarea>
          @error('message') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
        </div>
        <div class="text-center mt-4">
          <button wire:click="store_message" class="btn btn-primary">Submit</button>
      </div>
      </div>
    </div>
 


   </div>
  </section>
  <!-- End Contact Section -->
  @if(!empty($setting))
  <style>
     .info-box p{
        color: <?php echo $setting->primary_color ?> !important;
     }
   </style>
 @endif
 @endsection
 
 

