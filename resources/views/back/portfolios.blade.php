<div class="card-body">
    {{-- list portfolio --}}
    @if($button == 0 && $current == 3)
       <h4 class="text-center">Manage Portfolios</h4>
       @if(Session::has('message'))
       <div class="alert alert-success">
         <span class="text-capitalize font-bold">{{session()->get('message')}}</span>
       </div>
       @endif
       <div class="table-responsive containe mt-3">
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
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($portfolios as $portfolio)
                  <tr>
                    <th scope="row">{{$counter++}}</th>
                    <td>{{$portfolio->service->title}}</td>
                    <td>
                      @if(!empty($portfolio->photo))
                        @foreach (json_decode($portfolio->photo) as $photo)
                         <a href="{{ asset($photo)}}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                           <img src="{{ asset($photo)}}" height="50" width="50" alt="">
                         </a>
                          @break
                        @endforeach
                        <div class="portfolio-links">
                            @foreach (json_decode($portfolio->photo) as $photo)
                            <a href="{{ asset($photo)}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="
                            {{$portfolio->service->title}}"></a> 
                            @endforeach
                        </div> 
                      @endif
                    </td>
                    <td>{{substr($portfolio->description, 0,20)}}...</td>
                    <td>{{$portfolio->url}}</td>
                    <td>{{$portfolio->client}}</td>
                    <td>
                        <button wire:click="update_button({{$portfolio->id}})" class="btn btn-light"><span class="bi bi-pencil-square"></span></button>
                        <button wire:click="delete_portfolio({{$portfolio->id}})" class="btn btn-danger"> <span class="bi bi-trash"></span></button>
                    </td>
                  </tr> 
                @empty
                  <td><span class="mt-2">No Data Found</span></td>  
                @endforelse
           
            </tbody>
         </table>
       </div>

       {{-- update portfolio --}}
       @elseif($button == 2 && $current == 3)

         <h4 class="text-center">Update</h4>
          <div class="containe col-lg-10 col-sm-12 col-md-12 ml-5">
            <div class="form-group mt-3">
                <label for="service_id" class="">Category </label>
                <select wire:model.defer="service_id" class="form-control mt-2">
                    <option value="">Select Option</option>
                  @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->title}}</option>
                  @endforeach
                </select>
                @error('service_id') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="client" class="">Clients</label>
                <input type="text" wire:model.defer="client" class="form-control mt-2">
                @error('client') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="urls" class="">Url</label>
                <input type="text" wire:model.defer="url" class="form-control mt-2">
                @error('url') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="descriptions" class="">Description</label>
                <textarea wire:model.defer="description" class="form-control mt-2" rol="5"></textarea>
                @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>

            <div class="form-group mt-2">
                <label for="photo" class="">Photo</label>
                <div x-data="{ isUploading: false, progress: 0}" 
                    x-on:livewire-upload-start="isUploading = true; progress: 5"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                    <input type="file" class="form-control-file mt-2" accept="image/png, image/gif, image/jpeg" wire:model="photos" multiple>
                    <div x-show="isUploading" class="mt-2">
                      <progress max="100" x-bind:value="progress"></progress><br>
                    </div>
                    
                </div>
                @error('photos.*') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                {{-- @php
                    dd(gettype($photos));
                @endphp --}}
                @if(isset($photos))
                   Preview: <br>
                   @foreach ($photos as $photo)
                     <img src="{{$photo->temporaryUrl()}}" class="image_fit" height="170" width="214">
                   @endforeach

                 @elseif(!isset($photos))
                  @php
                      $works = App\Models\Work::where(['id'=>$update_id])->first();  
                  @endphp
                   {{-- @foreach ($images as $photo) --}}
                     @if(!is_null($works->photo))
                     Preview: <br>
                    @foreach (json_decode($works->photo) as $photo)
                      <img src="{{ asset($photo)}}" class="image_fit" height="170" width="214">
                    @endforeach
                    @endif
                  {{-- @endforeach --}}
                 
                 @endif
            </div>
            <div class="mt-4">
                <button wire:click="update_portifolio({{$update_id}})" class="btn btn-primary ml-4">Update</button>
                <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
         {{-- add new portfolio --}}
        @elseif($button == 1 && $current == 3)
          <h4 class="text-center">Add New</h4>
           <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
            <div class="form-group mt-3">
                <label for="service_id" class="">Category </label>
                <select wire:model.defer="service_id" class="form-control mt-2">
                    <option value="">Select Option</option>
                  @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->title}}</option>
                  @endforeach
                </select>
                @error('service_id') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="client" class="">Clients</label>
                <input type="text" wire:model.defer="client" class="form-control mt-2">
                @error('client') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="urls" class="">Url</label>
                <input type="text" wire:model.defer="url" class="form-control mt-2">
                @error('url') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="descriptions" class="">Description</label>
                <textarea   wire:model.defer="description" class="form-control mt-2" rol="5"></textarea>
                @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>

            <div class="form-group mt-2">
                <label for="photo" class="">Photo</label>
                <div x-data="{ isUploading: false, progress: 0}" 
                    x-on:livewire-upload-start="isUploading = true; progress: 5"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                    <input type="file" class="form-control-file mt-2" accept="image/png, image/gif, image/jpeg" wire:model="photos" multiple>
                    <div x-show="isUploading" class="mt-2">
                      <progress max="100" x-bind:value="progress"></progress><br>
                    </div>
                    
                </div>
                 @error('photos.*') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                 @if ($photos)
                    Preview: <br>
                    @foreach ($photos as $photo)
                      <img src="{{ $photo->temporaryUrl() }}" class="image_fit" height="170" width="214">
                    @endforeach
                 @endif
            </div>
            <div class="mt-4">
                <button wire:click="add_portfolio" class="btn btn-primary ml-4">Save</button>
                <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
       @endif
    </div>