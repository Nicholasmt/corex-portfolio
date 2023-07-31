<div class="card-body">
    {{-- list services --}}
         @if($button == 0 && $current ==8)
         <h4 class="text-center">Manage Social Media</h4>
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
                       <th scope="col">Title</th>
                       <th scope="col">Url</th>
                       <th scope="col">Icon</th>
                       <th scope="col">Actions</th>
                    </tr>
                   </thead>
                   <tbody>
                       @forelse ($socials as $social)
                       <tr>
                         <th scope="row">{{$counter++}}</th>
                         <th scope="row">{{$social->title}}</th>
                         <td scope="row">{{$social->url}}</td>
                         <td scope="row">{{$social->icon}}</td>
                         <td>
                           <button wire:click="update_button({{$social->id}})" class="btn btn-light"><span class="bi bi-pencil-square"></span></button>
                           <button wire:click="delete_social({{$social->id}})" class="btn btn-danger"><span class="bi bi-trash"></span></button>
                         </td>  
                       @empty
                         <td class="badge badge-light mt-4">No data found!</td>
                       </tr>
                       @endforelse
                   </tbody>
               </table>
              </div>
   
               {{-- add new about --}}
              @elseif($button == 1 && $current ==8)
                <h4 class="text-center">Add New</h4>
                 <div class="containe col-lg-10 col-sm-12 col-md-12 ml-5">
                    <div class="form-group mt-3">
                        <label for="title" class="">Title</label>
                        <input type="text" wire:model.defer="title" class="form-control mt-2">
                        @error('title') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="url" class="">Url</label>
                        <input type="text" wire:model.defer="url" class="form-control mt-2">
                        @error('url') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                    </div>
                   <div class="form-group mt-3">
                       <label for="icon" class="">icon </label>
                       <input type="text" wire:model.defer="icon" class="form-control mt-2">
                       @error('icon') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   
                   <div class="mt-4">
                       <button wire:click="add_social" class="btn btn-primary ml-4">Save</button>
                       <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                   </div>
               </div>
   
                {{-- update about --}}
               @elseif($button == 2 && $current ==8)
   
               <h4 class="text-center">Update</h4>
               <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                <div class="form-group mt-3">
                    <label for="title" class="">Title</label>
                    <input type="text" wire:model.defer="title" class="form-control mt-2">
                    @error('title') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="url" class="">Url</label>
                    <input type="text" wire:model.defer="url" class="form-control mt-2">
                    @error('url') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                </div>
                 <div class="form-group mt-3">
                     <label for="icon" class="">icon </label>
                     <input type="text" wire:model.defer="icon" class="form-control mt-2">
                     @error('icon') <span class="text-danger font-13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                
                 <div class="mt-4">
                     <button wire:click="update_social({{$update_id}})" class="btn btn-primary ml-4">Update</button>
                     <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                 </div>
             </div>
             @endif
           </div>