<div>
  {{-- In work, do what you enjoy. --}}
  <section class="section-show">
    <div class="container">
      <div class="row">
          <div class="col-3 sidebar-bg">
            <div class="d-flex align-items-start">
              <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button wire:click="dashboard" class="nav-link mt-2 @if(!Session::has('section') && $current == 1) active @elseif($current == 1) active @endif" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class=" bi bi-house-door"> </i> Dashboard</button>
                <button wire:click="services" class="nav-link mt-2 @if($current == 2) active @endif" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class=" bi bi-bookmark-check"> </i> Services</button>
                <button wire:click="portfolio" class="nav-link mt-2 @if($current == 3) active @endif" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-card-image"></i> Portfolios</button>
                <button wire:click="about" class="nav-link mt-2 @if($current == 5) active @endif" id="v-pills-about-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about" aria-selected="false"><i class="bi bi-card-image"></i> About</button>
                <button wire:click="education" class="nav-link mt-2 @if($current == 6) active @endif" id="v-pills-education-tab" data-bs-toggle="pill" data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education" aria-selected="false"><i class="bi bi-card-image"></i> Educations</button>
                <button wire:click="experience" class="nav-link mt-2 @if($current == 7) active @endif" id="v-pills-experience-tab" data-bs-toggle="pill" data-bs-target="#v-pills-experience" type="button" role="tab" aria-controls="v-pills-experience" aria-selected="false"><i class="bi bi-card-image"></i> Experiences</button>
                <button wire:click="social" class="nav-link mt-2 @if($current == 8) active @endif" id="v-pills-social-tab" data-bs-toggle="pill" data-bs-target="#v-pills-social" type="button" role="tab" aria-controls="v-pills-socials" aria-selected="false"><i class="bi bi-card-image"></i> Socials</button>
                <button wire:click="settings" class="nav-link mt-2 @if($current == 4) active @endif" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"> <i class="bi bi-person-fill-gear"></i> Settings</button>
                <a href="{{ route('logout')}}" class="nav-link mt-2 ml-3"> <i class="bi bi-box-arrow-right"></i> Logout</a>
             </div>
           </div>
         </div>
         <div class="col-9">
           <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade @if(!Session::has('section') && $current == 1) show active @elseif($current == 1) show active @endif" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="card-body">
                    <h4 class="text-center">Dashboard</h4>
                 </div>
               </div>
                
               {{-- services --}}
              <div class="tab-pane fade @if($current == 2) show active  @endif" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                @include('back.services')
              </div>

                {{-- portfolio --}}
                <div class="tab-pane fade  @if($current == 3) show active @endif" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    @include('back.portfolios') 
                </div> 
                {{-- about --}}
                <div class="tab-pane fade  @if($current == 5) show active @endif" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
                    @include('back.about') 
                </div> 
                 {{-- education --}}
                <div class="tab-pane fade  @if($current == 6) show active @endif" id="v-pills-education" role="tabpanel" aria-labelledby="v-pills-education-tab">
                    @include('back.educations') 
                </div> 
                 {{-- experience --}}
                <div class="tab-pane fade  @if($current == 7) show active @endif" id="v-pills-experience" role="tabpanel" aria-labelledby="v-pills-experience-tab">
                    @include('back.experiences') 
                </div> 
                {{-- social --}}
                <div class="tab-pane fade  @if($current == 8) show active @endif" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
                    @include('back.socials') 
                </div> 

                {{-- manage profile --}}
                <div class="tab-pane fade @if($current == 4) show active  @endif" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                   @include('back.settings')
                </div>

                </div>
            </div>
          </div>
       </div>
    </section>
 </div>
 @push('scripts')
  
 @endpush

