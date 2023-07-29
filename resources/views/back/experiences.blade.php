<div class="card-body">
    {{-- list services --}}
         @if($button == 0 && $current ==7)
         <h4 class="text-center">Manage Experiences</h4>
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
                       <th scope="col">Organization</th>
                       <th scope="col">City</th>
                       <th scope="col">Location</th>
                       <th scope="col">Description</th>
                       <th scope="col">Start Year</th>
                       <th scope="col">End Year</th>
                       <th scope="col">Actions</th>
                   </tr>
                   </thead>
                   <tbody>
                       @forelse ($experiences as $experience)
                       <tr>
                         <th scope="row">{{$counter++}}</th>
                         <td>{{$experience->title}}</td>
                         <td>{{$experience->organization}}</td>
                         <td>{{$experience->city}}</td>
                         <td>{{$experience->location}}</td>
                         <td>{{$experience->description}}</td>
                         <td>{{$experience->start_year}}</td>
                         <td>{{$experience->end_year}}</td>
                         <td>
                           <button wire:click="update_button({{$experience->id}})" class="btn btn-light"><span class="bi bi-pencil-square"></span></button>
                           <button wire:click="delete_experience({{$experience->id}})" class="btn btn-danger"><span class="bi bi-trash"></span></button>
                       </td>  
                       @empty
                         <td class="badge badge-light mt-4">No data found!</td>
                       </tr>
                       @endforelse
                   </tbody>
               </table>
              </div>
   
               {{-- add new about --}}
              @elseif($button == 1 && $current ==7)
                <h4 class="text-center">Add New</h4>
                 <div class="containe col-lg-10 col-sm-12 col-md-12 ml-5">
                    <div class="form-group mt-3">
                        <label for="title" class="">Title</label>
                        <input type="text" wire:model.defer="title" class="form-control mt-2">
                        @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                    </div>
                   <div class="form-group mt-3">
                       <label for="organization" class="">Organization </label>
                       <input type="text" wire:model.defer="organization" class="form-control mt-2">
                       @error('organization') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   <div class="form-group mt-2">
                       <label for="city" class="">City</label>
                       <input type="text" wire:model.defer="city" class="form-control mt-2">
                       @error('city') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   <div class="form-group mt-2">
                       <label for="description" class="">Description</label>
                       <textarea type="text" wire:model.defer="description" col="5" class="form-control mt-2"></textarea>
                       @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   <div class="form-group mt-2">
                    <label for="location" class="">Location</label>
                    <input type="text" wire:model.defer="location" class="form-control mt-2">
                    @error('location') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="start_year" class="">Start Year</label>
                    <input type="month" wire:model.defer="start_year" class="form-control mt-2">
                    @error('start_year') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="end_year" class="">End Year</label>
                    <input type="month" wire:model.defer="end_year" class="form-control mt-2">
                    @error('end_year') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                   <div class="mt-4">
                       <button wire:click="add_experience" class="btn btn-primary ml-4">Save</button>
                       <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                   </div>
               </div>
   
                {{-- update about --}}
               @elseif($button == 2 && $current ==7)
   
               <h4 class="text-center">Update</h4>
               <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                <div class="form-group mt-3">
                    <label for="title" class="">Title</label>
                    <input type="text" wire:model.defer="title" class="form-control mt-2">
                    @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                 <div class="form-group mt-3">
                     <label for="organization" class="">Organization </label>
                     <input type="text" wire:model.defer="organization" class="form-control mt-2">
                     @error('organization') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                 <div class="form-group mt-2">
                     <label for="city" class="">City</label>
                     <input type="text" wire:model.defer="city" class="form-control mt-2">
                     @error('city') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                 <div class="form-group mt-2">
                   <label for="description" class="">Description</label>
                   <textarea type="text" wire:model.defer="description" class="form-control mt-2" col="5"></textarea>
                   @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                 <div class="form-group mt-2">
                    <label for="location" class="">Location</label>
                    <input type="text" wire:model.defer="location" class="form-control mt-2"> 
                    @error('location') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="start_year" class="">Start Year</label>
                    <input type="month" wire:model.defer="start_year" class="form-control mt-2">
                    @error('start_year') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="end_year" class="">End Year</label>
                    <input type="month" wire:model.defer="end_year" class="form-control mt-2">
                    @error('end_year') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                 <div class="mt-4">
                     <button wire:click="update_experience({{$update_id}})" class="btn btn-primary ml-4">Update</button>
                     <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                 </div>
             </div>
             @endif
           </div>