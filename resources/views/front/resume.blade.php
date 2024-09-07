@extends('layouts.app')
@section('contents')

@include('layouts.nav')

 <!-- ======= Resume Section ======= -->
 <section id="resume" class="resume section-show">
    <div class="container">

      <div class="section-title">
        <h2>Resume</h2>
        @if (auth()->check())
         <a href="{{ route('download-resume')}}" class="btn btn-light float-end"> Print</a>
        @endif
        <p>Check My Resume</p>
      </div>
     <div class="row">
        <div class="col-lg-6">
          <a href="{{ route('hire-me')}}" class="btn btn-primary float-end"> Hire Me</a>
          <h3 class="resume-title">Sumary</h3>
          <div class="resume-item pb-0">
            <h4> @if(!empty($setting)) {{ $setting->full_name }}  @else  MY Name here  @endif</h4>
            @if (!empty($contact))
              <p>
                <em>{{$contact->title}} </em></p>
              <p>
             @endif
            <ul>
              @if (!empty($contact))
                <li>{{$contact->address}}</li>
                <li>
                  {{-- @foreach (json_decode($contact->phone) as $phone)
                    {{$phone}} ||
                  @endforeach --}}
                  {{ $contact->phone }}
                </li>
                <li> <a href="mailto:nicholasmt09@gmail.com" class="">nicholasmt09@gmail.com</a></li>
              @endif
            </ul>
            </p>
          </div>

          <h3 class="resume-title">Education</h3>
           @forelse ($educations as $education)
            <div class="resume-item">
              <h4>{{$education->title}}</h4>
              <h5>{{$education->started." - ".$education->graduated}}</h5>
              <p><em>{{$education->institution}}</em></p>
              <p>{{$education->description}}</p>
            </div>
          @empty
           No Data Found!   
          @endforelse
        </div>

        {{-- Experiences Start --}}
         
        <div class="col-lg-6">
          <div id="portfolio" class="portfolio">
             <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
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
          <h3 class="resume-title">Professional Experience</h3>
          <div class="portfolio-container">
           @forelse ($experiences as $experience)
             <div class="portfolio-item fliter-{{$experience->service->title}}">
              <div class="resume-item">
                <h4>{{$experience->title}}</h4> 
                <h5>{{\Carbon\Carbon::parse($experience->start_date )->format('M d, Y')}} - {{  $experience->present == true ? 'Present' : \Carbon\Carbon::parse($experience->end_date )->format('M d, Y')  }} </h5>
                <p><em>{{$experience->location}} </em></p>
                <p><em>{{$experience->organization}} </em></p>
                <p>
                <ul>
                  {{-- @foreach (json_decode($experience->description) as $content)
                    <li>{{$content}}</li>
                  @endforeach --}}   
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
  
 @if(!empty($setting))
  @php
    $mycolor_1 = App\Services\Hex2Rgb::hex2rgba($setting->primary_color,0.6);
    $mycolor_2 = App\Services\Hex2Rgb::hex2rgba($setting->primary_color,0.8);
  @endphp
   <style>
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