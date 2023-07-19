@extends('layouts.app')
@section('contents')

@include('layouts.nav')
 <section class="section-show">
   <div class="container">
    <div class="row">
      <div class="col-3 sidebar-bg">

            <livewire:sidebar-controller/>
            @livewireScripts

        </div>
          <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                
                <livewire:dashboard/>
                @livewireScripts

              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                 <livewire:services/>
                 @livewireScripts

              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                
                <livewire:portfolio/>
                @livewireScripts

              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
               
                <livewire:settings/>
                @livewireScripts

              </div>
            </div>
          </div>
       </div>
     </div>
  </section>
@endsection