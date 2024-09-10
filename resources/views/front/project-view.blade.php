@extends('layouts.app')
@section('contents')
 
<!-- ======= Portfolio Details ======= -->
<div id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row">

        <div class="col-lg-8">
          <h2 class="portfolio-title">{{$view_project->name}}</h2>
           <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
               @forelse ($view_project->portfolios as $portfolio)
                  <div class="swiper-slide">
                      <x-curator-glider
                        class="img"
                        :media="$portfolio->img"
                        alt="project image"
                        width="600" 
                        height="400"
                      />
                  </div>
                @empty
                  <p class="text-center">No project portfolio found!</p>
                @endforelse
             </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4 portfolio-info">
          <h3>Project Information</h3>
          <ul>
            <li><strong>Services</strong>: {{$view_project->service->title}}</li>
            {{-- <li><strong>Project date</strong>: {{$view_project->created_at}}</li> --}}
            <li class="text-url"><strong>Project URL</strong>: <a href="{{$view_project->url}}">visit site</a></li>
          </ul>
          <p>
            {{$view_project->description}}
          </p>
        </div>

      </div>

    </div>
  </div><!-- End Portfolio Details -->
  @if(!empty($setting))
        <style>
         .text-url a{
            color: <?php echo $setting->primary_color ?> !important;
        }
        .portfolio-details .swiper-pagination .swiper-pagination-bullet-active{
            background: <?php echo $setting->primary_color ?> !important;
        }
      </style>
    @endif
 @endsection