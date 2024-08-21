@extends('layouts.app')
@section('contents')
 
<!-- ======= Portfolio Details ======= -->
<div id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row">

        <div class="col-lg-8">
          <h2 class="portfolio-title">{{$detail->service->title}}</h2>
           <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
               @foreach (json_decode($detail->photo) as $photos)
                <div class="swiper-slide">
                    <img src="{{ asset($photos)}}" height="400" width="600" class="img" alt="">
                </div>
                @endforeach
             </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4 portfolio-info">
          <h3>Project Information</h3>
          <ul>
            <li><strong>Category</strong>: {{$detail->service->title}}</li>
            <li><strong>Client</strong>: {{$detail->client}}</li>
            <li><strong>Project date</strong>: {{$detail->created_at}}</li>
            <li><strong>Project URL</strong>: <a href="{{$detail->url}}">{{$detail->url}}</a></li>
          </ul>

          <p>
            {{$detail->description}}
          </p>
        </div>

      </div>

    </div>
  </div><!-- End Portfolio Details -->
 @endsection