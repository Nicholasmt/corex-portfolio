@extends('layouts.app')
@section('contents')
@include('layouts.nav') 

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-show">
    <div class="container">

      <div class="section-title">
        <h2>blog</h2>
        {{-- <p>Contact Me</p> --}}
      </div>

      <div class="row mt-2">
       @forelse($blogs as $blog)
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <div class="text-center">
              <x-curator-glider
              class="img-fluid"
              :media="$blog->image"
              alt="img"
              width="200" 
              height="170"
            />
            </div>
              <p class="fw-bold">{{ $blog->title }}</p> <br>
              <span>{{\Carbon\Carbon::parse($blog->created_at )->format('M d, Y')}}</span>
          </div>
        </div>
      @empty
       <p class="text-center fw-bold">No Data Found!</p>
      @endforelse
      </div>
   </div>
  </section>
  <!-- End Contact Section -->
 @endsection
 
@section('script')

@livewireScripts
    @stack('scripts')
    <script>
      $(document).ready(function(){
        window.livewire.on('alert_remove',()=>{
          setTimeout(function(){ $(".alert-success").fadeOut('fast');
          }, 3000);
        });
    });
</script>
@endsection

