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
     .contact .info-box i.bx {
        color: <?php echo $setting->primary_color ?> !important;
     }
     .info-box a{
        color: <?php echo $setting->primary_color ?> !important;
     }
   </style>
 @endif
@endsection

