@extends('layouts.app')
@section('contents')
@include('layouts.nav') 
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-show">
    <div class="container">
      <div class="section-title">
        <h2>Projects</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @forelse ($services as $service)
              <li data-filter=".fliter-{{$service->id}}">{{$service->title}}</li>
             @empty
             <li>No Data Found</li>
            @endforelse
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        @forelse ($projects as $project)
         <div class="col-lg-4 col-md-6 portfolio-item fliter-{{$project->service_id}}">
          <div class="portfolio-wrap">
              <x-curator-glider
                class="img-fluid"
                :media="$project->image_id"
                alt="project image"
                {{-- width="403" 
                height="403" --}}
              />
             <div class="portfolio-info"> 
              <h4>{{$project->name}}</h4>
              <p>{{$project->description}}</p>
              <div class="portfolio-links">
                @forelse($project->portfolios as $key => $portfolio)
                   @php
                    $media = App\Models\Media::where('id',$portfolio->img)->first();
                  @endphp
                  @if($key == 0)
                    <a href="{{ asset('storage/'.$media->path)}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Project Preview"><i class="bi bi-eye"></i></a>
                  @else
                    <a href="{{ asset('storage/'.$media->path)}}" data-gallery="portfolioGallery" class="portfolio-lightbox"></a>
                  @endif
                @empty
                  <p class="text-center">No project portfolio found!</p>
                @endforelse
                <a href="{{ route('view-project',$project->id)}}" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Project information"><i class="bx bx-link"></i></a>
              </div>
            </div>
         </div>
        </div>
        @empty
          <p class="badge badge-info">No Data Found</p>  
        @endforelse
      </div>
    </div>
  </section><!-- End Portfolio Section -->
 @endsection