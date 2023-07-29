<div class="card-body">
    {{-- list services --}}
         @if($button == 0 && $current ==6)
         <h4 class="text-center">Manage Educations</h4>
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
                       <th scope="col">Institution</th>
                       <th scope="col">Degree</th>
                       <th scope="col">description</th>
                       <th scope="col">Year of Entry</th>
                       <th scope="col">Year of Graduation</th>
                       <th scope="col">Actions</th>
                   </tr>
                   </thead>
                   <tbody>
                       @forelse ($educations as $education)
                       <tr>
                         <th scope="row">{{$counter++}}</th>
                         <td>{{$education->title}}</td>
                         <td>{{$education->Institution}}</td>
                         <td>{{$education->degree}}</td>
                         <td>{{$education->description}}</td>
                         <td>{{$education->started}}</td>
                         <td>{{$education->graduated}}</td>
                         <td>
                           <button wire:click="update_button({{$education->id}})" class="btn btn-light"><span class="bi bi-pencil-square"></span></button>
                           <button wire:click="delete_education({{$education->id}})" class="btn btn-danger"><span class="bi bi-trash"></span></button>
                       </td>  
                       @empty
                         <td class="badge badge-light mt-4">No data found!</td>
                       </tr>
                       @endforelse
                   </tbody>
               </table>
              </div>
   
               {{-- add new about --}}
              @elseif($button == 1 && $current ==6)
                <h4 class="text-center">Add New</h4>
                 <div class="containe col-lg-10 col-sm-12 col-md-12 ml-5">
                    <div class="form-group mt-3">
                        <label for="title" class="">title</label>
                        <textarea type="text" wire:model.defer="title" class="form-control mt-2" col="5"></textarea>
                        @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                    </div>
                   <div class="form-group mt-3">
                       <label for="institution" class="">Institution </label>
                       <input type="text" wire:model.defer="institution" class="form-control mt-2">
                       @error('institution') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   <div class="form-group mt-2">
                       <label for="degree" class="">Degree</label>
                       <input type="text" wire:model.defer="degree" class="form-control mt-2">
                       @error('degree') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   <div class="form-group mt-2">
                       <label for="description" class="">Description</label>
                       <textarea type="text" wire:model.defer="description" col="5" class="form-control mt-2"></textarea>
                       @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                   </div>
                   <div class="form-group mt-2">
                    <label for="started" class="">Year of Entry</label>
                    <input type="month" wire:model.defer="started" class="form-control mt-2">
                    @error('started') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="graduated" class="">Year of Graduation</label>
                    <input type="month" wire:model.defer="graduated" class="form-control mt-2">
                    @error('graduated') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                   <div class="mt-4">
                       <button wire:click="add_education" class="btn btn-primary ml-4">Save</button>
                       <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                   </div>
               </div>
   
                {{-- update about --}}
               @elseif($button == 2 && $current ==6)
   
               <h4 class="text-center">Update</h4>
               <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                <div class="form-group mt-3">
                    <label for="title" class="">Title</label>
                    <textarea type="text" wire:model.defer="title" class="form-control mt-2" col="5"></textarea>
                    @error('title') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                 <div class="form-group mt-3">
                     <label for="institution" class="">Institution </label>
                     <input type="text" wire:model.defer="institution" class="form-control mt-2">
                     @error('institution') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                 <div class="form-group mt-2">
                     <label for="degree" class="">Degree</label>
                     <input type="text" wire:model.defer="degree" class="form-control mt-2">
                     @error('degree') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                 <div class="form-group mt-2">
                   <label for="description" class="">Description</label>
                   <textarea type="text" wire:model.defer="description" class="form-control mt-2" col="5"></textarea>
                   @error('description') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                 </div>
                 <div class="form-group mt-2">
                    <label for="started" class="">Year of Entry</label>
                    <input type="month" wire:model.defer="started" class="form-control mt-2"> 
                    @error('started') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="graduated" class="">Year of Graduation</label>
                    <input type="month" wire:model.defer="graduated" class="form-control mt-2">
                    @error('graduated') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
                </div>
                 <div class="mt-4">
                     <button wire:click="update_education({{$update_id}})" class="btn btn-primary ml-4">Update</button>
                     <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                 </div>
             </div>
             @endif
           </div>