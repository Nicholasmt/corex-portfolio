@extends('layouts.app')
@section('contents')
@include('layouts.nav') 
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-show">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @forelse ($services as $service)

            <li data-filter=".fliter-{{$service->title}}">{{$service->title}}</li>
                
            @empty
            
            {{-- <li data-filter=".filter-card">3D</li> --}}
            <li>No Data Found</li>


            @endforelse
            {{-- <li data-filter=".filter-web">Web</li> --}}
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        @forelse ($works as $work)
         <div class="col-lg-4 col-md-6 portfolio-item fliter-{{$work->service->title}}">
          <div class="portfolio-wrap">
            @foreach (json_decode($work->photo) as $photo)
             <img src="{{ asset($photo)}}" class="img-fluid" alt="">
             <div class="portfolio-info">
              <h4>{{$work->service->title}}</h4>
              {{-- <p>{{$work->service->title}}</p> --}}
              <div class="portfolio-links">
                <a href="{{ asset($photo)}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$work->service->title}}"><i class="bi bi-eye"></i></a>
                <a href="{{ route('detail',$work->id)}}" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
            @break
            @endforeach
          </div>
        </div>
        @empty
          <p class="badge badge-info">No Data Found</p>  
        @endforelse
      </div>
    </div>
  </section><!-- End Portfolio Section -->
 @endsection