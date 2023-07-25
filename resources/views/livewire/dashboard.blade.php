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
                <button wire:click="settings" class="nav-link mt-2 @if($current == 4) active @endif" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"> <i class="bi bi-gear-wide"></i> Settings</button>
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
                
             <div class="tab-pane fade @if($current == 2) show active  @endif" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="card-body">
                  @if($button == 0 && $current ==2)
                  <h4 class="text-center">Manage Services</h4>
                  @if(Session::has('message'))
                  <div class="alert alert-success">
                    <span class="text-capitalize font-bold">{{session()->get('message')}}</span>
                  </div>
                  @endif
                     <div class="table-responsive container mt-3">
                        <table class="table table-dark table-hover">
                            <div class="float-end mt-3">
                                <button wire:click="add_button" class="btn btn-light mb-3">
                                  <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Descriptions</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                <tr>
                                  <th scope="row">{{$counter++}}</th>
                                  <td>{{$service->title}}</td>
                                  <td>{{$service->descriptions}}</td>
                                  <td>
                                    <button wire:click="update_button({{$service->id}})" class="btn btn-light"><span class="bi bi-pencil-square"></span></button>
                                    <button wire:click="delete_services({{$service->id}})" class="btn btn-danger"><span class="bi bi-trash"></span></button>
                                </td>  
                                @empty
                                  <td class="badge badge-light mt-4">No data found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                       </div>

                       @elseif($button == 1 && $current ==2)

                       <h4 class="text-center">Add New</h4>
                          <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                            <div class="form-group mt-3">
                                <label for="title" class="">Title </label>
                                <input type="text" wire:model.defer="title" class="form-control">
                                @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="descriptions" class="">Descriptions</label>
                                <input type="text" wire:model.defer="description" class="form-control">
                                @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                            </div>
                            <div class="mt-4">
                                <button wire:click="add_service" class="btn btn-primary ml-4">Save</button>
                                <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>

                        @elseif($button == 2 && $current ==2)

                        <h4 class="text-center">Update</h4>
                        <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                          <div class="form-group mt-3">
                              <label for="title" class="">Title </label>
                              {{-- <input type="text" wire:model.defer="id" value="{{$update_id}}"> --}}
                              <input type="text" wire:model.defer="title" class="form-control">
                              @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                          </div>
                          <div class="form-group mt-2">
                              <label for="descriptions" class="">Descriptions</label>
                              <input type="text" wire:model.defer="description" class="form-control">
                              @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                          </div>
                          <div class="mt-4">
                              <button wire:click="update_services({{$update_id}})" class="btn btn-primary ml-4">Update</button>
                              <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                          </div>
                      </div>
                        
                      @endif
                       
                      </div>
                     
                     </div>
                
                     <div class="tab-pane fade  @if($current == 3) show active @endif" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="card-body">
                        @if($button == 0 && $current == 3)
                           <h4 class="text-center">Manage Portfolios</h4>
                           <div class="table-responsive container mt-3">
                             <table class="table table-dark table-hover">
                                <div class="float-end mt-3">
                                    <button wire:click="add_button" class="btn btn-light mb-3">
                                        <i class="bi bi-plus"></i>
                                      </button>
                                </div>
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Catgory</th>
                                    <th scope="col">Photos</th>
                                    <th scope="col">Descriptions</th>
                                    <th scope="col">Urls</th>
                                    <th scope="col">Clients</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                </tbody>
                             </table>
                           </div>

                           @elseif($button == 1 && $current == 3)

                           <h4 class="text-center">Add New</h4>
                              <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                                <div class="form-group mt-3">
                                    <label for="title" class="">Service </label>
                                    <select wire:model.defer="" class="form-control">
                                        <option value="">Select Option</option>
                                      @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                      @endforeach
                                    </select>
                                    @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="descriptions" class="">Descriptions</label>
                                    <input type="text" wire:model.defer="description" class="form-control">
                                    @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                                </div>
                                <div class="mt-4">
                                    <button wire:click="add_service" class="btn btn-primary ml-4">Save</button>
                                    <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                            
                          @endif

                        </div>
                    </div> 
                
                    <div class="tab-pane fade @if($current == 4) show active  @endif" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="card-body">
                            <h4 class="text-center">Manage Profile</h4>
                        </div>
                     </div>

               </div>
            </div>
          </div>
       </div>
    </section>
 </div>
 @push('scripts')
  
 @endpush

