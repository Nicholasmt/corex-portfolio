@extends('layouts.app')
@section('contents')
@include('layouts.nav') 

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-show">
    <div class="container">

      <div class="section-title">
        <h2>blog</h2>
        <p>MY Articles</p>
      </div>

      <div class="row mt-2">
       @forelse($blogs as $blog)
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <div class="text-center">
              <a href="#">
                <x-curator-glider
                  class="img-fluid"
                  :media="$blog->image"
                  alt="img"
                  width="400" 
                  height="300"
                />
              <p class="fw-bold text-start mt-2">{{ $blog->title }}</p> 
            </a>
            <span>{{\Carbon\Carbon::parse($blog->created_at )->format('M d, Y')}}</span>
          </div>
          </div>
        </div>
      @empty
       <p class="text-center fw-bold">No Data Found!</p>
      @endforelse
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
 
 

