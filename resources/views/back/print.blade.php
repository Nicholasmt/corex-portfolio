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
 <section id="resume" class="resume section-show bg-black">
    <div class="container d-print">
      <div class="section-title">
        <h2 class="print-title">Resume</h2>
        @if (Session::get('authentication') == true)
        <button id="print" class="btn btn-primary float-end"> Print</button>
        @endif
        <p class="print-title">My Resume</p>
      </div>
     <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title print-title">About</h3>
          <div class="resume-item pb-0">
            <h4>Nicholas Tochukwu</h4>
            @forelse ($abouts as $about)
            <p class="print-text">
              <em>{{$about->title}} </em></p>
            <p>
             @break     
            @empty
            No Data Found!
            @endforelse
            <ul>
              @forelse ($abouts as $about)
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
              <p class="print-text"><em>{{$education->institution}}</em></p>
              <p class="print-text">{{$education->description}}</p>
            </div>
          @empty
           No Data Found!   
          @endforelse
        </div>
        <div class="col-lg-6">
          <h3 class="resume-title print-title">Professional Experience</h3>
          @forelse ($experiences as $experience)
          <div class="resume-item">
            <h4>{{$experience->title}}</h4>
            <h5 class="print-text">{{$experience->start_year." - ".$experience->end_year}}</h5>
            <p class="print-text"><em>{{$experience->location}} </em></p>
            <p>
            <ul>
              @foreach (json_decode($experience->description) as $content)
                <li class="print-text">{{$content}}</li>
                @endforeach
             </ul>
            </p>
          </div>
          @empty
             No Data Found! 
          @endforelse
        </div>
      </div>
    </div>
  </section><!-- End Resume Section -->  
 
@endsection

@section('script')
{{-- <script>
    $('#print').click(function(e){
     window.print();
    });
</script> --}}
@endsection


