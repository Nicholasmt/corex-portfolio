@extends('layouts.app')
@section('contents')
@include('layouts.nav') 

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-show">
    <div class="container">

      <div class="section-title">
        <h2>Hire Me</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            @if (!empty($contact))
              <p>{{$contact->address}}</p>
           @endif
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
                @forelse ($socials as $social)
                  <a href="{{$social->url}}" class="twitter"><i class="{{$social->icon}}"></i></a>
                 @empty
                 No Data Found!  
                @endforelse
                
           </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p> <a href="mailto:nicholasmt09@gmail.com" class=""> nicholasmt09@gmail.com </a></p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            @if(!empty($contact))
             <p> 
              {{-- @foreach (json_decode($about->phone) as $phone)
                 {{$phone}} ||
              @endforeach --}}
              {{ $contact->phone }}
             </p>
           @endif
          </div>
        </div>
      </div>

      @livewireStyles

      <livewire:contact-me/>

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

