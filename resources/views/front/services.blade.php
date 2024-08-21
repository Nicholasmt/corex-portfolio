@extends('layouts.app')
@section('contents')

@include('layouts.nav') 

<!-- ======= Services Section ======= -->
<section id="services" class="services section-show">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
      </div>

      <div class="row">
        @forelse ($services as $service)
            
        <div class="col-lg-4 col-md-6 d-fle align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="{{$service->icon}}"></i></div>
            <h4><a href="">{{$service->title}}</a></h4>
            <p>{{$service->description}}</p>
          </div>
        </div>

        @empty

           No Data Found!

        @endforelse

        
  

      </div>

    </div>
  </section><!-- End Services Section -->

@endsection