<div class="card-body">
 {{-- list services --}}
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
                      <td>{{$service->description}}</td>
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

            {{-- add new service --}}
           @elseif($button == 1 && $current ==2)
             <h4 class="text-center">Add New</h4>
              <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                <div class="form-group mt-3">
                    <label for="title" class="">Title </label>
                    <input type="text" wire:model.defer="title" class="form-control mt-2">
                    @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="descriptions" class="">Descriptions</label>
                    <input type="text" wire:model.defer="description" class="form-control mt-2">
                    @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="icon" class="">Icon</label>
                    <input type="text" wire:model.defer="icon" class="form-control mt-2">
                    @error('icon') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="mt-4">
                    <button wire:click="add_service" class="btn btn-primary ml-4">Save</button>
                    <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                </div>
            </div>

             {{-- update service --}}
            @elseif($button == 2 && $current ==2)

            <h4 class="text-center">Update</h4>
            <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
              <div class="form-group mt-3">
                  <label for="title" class="">Title </label>
                  {{-- <input type="text" wire:model.defer="id" value="{{$update_id}}"> --}}
                  <input type="text" wire:model.defer="title" class="form-control mt-2">
                  @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
              </div>
              <div class="form-group mt-2">
                  <label for="descriptions" class="">Descriptions</label>
                  <input type="text" wire:model.defer="description" class="form-control mt-2">
                  @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
              </div>
              <div class="form-group mt-2">
                <label for="icon" class="">Icon</label>
                <input type="text" wire:model.defer="icon" class="form-control mt-2">
                @error('icon') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
              <div class="mt-4">
                  <button wire:click="update_services({{$update_id}})" class="btn btn-primary ml-4">Update</button>
                  <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
              </div>
          </div>
          @endif
        </div>