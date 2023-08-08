@section('head') 
<link href="{{ asset('assets/css/print.css')}}"   rel="stylesheet">
@endsection

@extends('layouts.app')
@section('contents')
<style>
    body::before{
     position: none !important;
     background: black !important;
    }
    .credits{
        display: none !important;
    }
    
</style>
 <!-- ======= Resume Section ======= -->
 <section id="resume" class="resume section-show print-bg">
  <div class="container print-margin">
     <div class="section-title">
      <h2 class="print-title">Resume</h2>
      @if (Session::get('authentication') == true)
      <a id="print" class="btn btn-light float-end"> Print</a>
      @endif
      <p class="print-title">My Resume</p>
    </div>
   <div class="row">
      <div class="col-lg-6">
        <h3 class="resume-title print-title">Sumary</h3>
        <div class="resume-item pb-0">
          <h4>Nicholas Tochukwu</h4>
          @forelse ($abouts as $about)
          <p class="print-title">
            <em>{{$about->title}} </em>
          </p>
         
           @break     
          @empty
          No Data Found!
          @endforelse
          <ul>
            @forelse ($about as $abot)
            <li class="print-text">{{$about->address}}</li>
            <li class="print-text">
              @foreach (json_decode($about->phone) as $phone)
                {{$phone}} ||
              @endforeach
            </li>
            @break    
            @empty
            No Data Found!   
            @endforelse
            <li class="print-text">nicholasmt09@gmail.com</li>
          </ul>
          </p>
        </div>

        <h3 class="resume-title print-title">Education</h3>
         @forelse ($educations as $education)
          <div class="resume-item">
            <h4>{{$education->title}}</h4>
            <h5 class="print-text">{{$education->started." - ".$education->graduated}}</h5>
            <p><em class="print-text">{{$education->institution}}</em></p>
            <p class="print-text">{{$education->description}}</p>
          </div>
        @empty
         No Data Found!   
        @endforelse
      </div>

      {{-- Experiences Start --}}

      <div class="col-lg-6">

        <div id="portfolio" class="portfolio">

           <div class="row" id="print">
            <div class="col-lg-10 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                @forelse ($services as $service)
                  <li data-filter=".fliter-{{$service->title}}">{{$service->title}}</li>
                 @empty
                 <li>No Data Found</li>
                @endforelse
              </ul>
            </div>
          </div>
          <h3 class="resume-title print-title">Professional Experience</h3>
        <div class="portfolio-container">
         @forelse ($experiences as $experience)
           <div class="portfolio-item fliter-{{$experience->category->title}}">
            <div class="resume-item print-text">
              <h4>{{$experience->title}}</h4> 
              <h5>{{$experience->start_year." - ".$experience->end_year}}</h5>
              <p><em>{{$experience->location}} </em></p>
              <p>
              <ul>
                @foreach (json_decode($experience->description) as $content)
                  <li>{{$content}}</li>
                @endforeach
              </ul>
              </p>
              </div>
            </div>
          @empty
           No Data Found! 
          @endforelse
        </div> 
       </div>
    </div>
      {{-- Experiences Ends --}}
    </div>
  </div>
</section><!-- End Resume Section --> 
 
@endsection

@section('script')
<script>
  $("#print").on("click", function(e){
    window.print();
  });
</script>
@endsection


