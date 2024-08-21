<div class="card-body">
    {{-- list services --}}
         @if($button == 0 && $current == 10)
         <h4 class="text-center">Manage Messages</h4>

         @if(Session::has('message'))
         <div class="alert alert-success">
           <span class="text-capitalize font-bold">{{session()->get('message')}}</span>
         </div>
          @endif

            <div class="table-responsive containe mt-3">
               <table class="table table-dark table-hover">
                   <div class="float-end mt-3">
                       {{-- <button wire:click="add_button" class="btn btn-light mb-3">
                         <i class="bi bi-plus"></i>
                       </button> --}}
                   </div>
                   <thead>
                     <tr>
                       <th scope="col">No</th>
                       <th scope="col">Full Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Subject</th>
                       <th scope="col">Actions</th>
                   </tr>
                   </thead>
                   <tbody>
                    @foreach($messages->chunk(10) as $group)
                       @forelse ($group as $message)
                       <tr>
                         <th scope="row">{{$counter++}}</th>
                         <td>{{$message->full_name}}</td>
                         <td>{{$message->email}}</td>
                         <td>{{substr($message->subject,0,20)}}</td>
                        <td>
                           <button wire:click="view_message({{$message->id}})" class="btn btn-light"><span class="bi bi-eye"></span></button>
                        </td>  
                       @empty
                         <td class="badge badge-light mt-4">No data found!</td>
                       </tr>
                       @endforelse
                       @endforeach
                   </tbody>
               </table>
              </div>
   
               
                {{-- view about --}}
               @elseif($button == 1 && $current == 10)
   
               <h4 class="text-center">View Message</h4>
               <div class="container col-lg-10 col-sm-12 col-md-12 ml-5">
                <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-6 form-group mt-3">
                      <h3 for="content" class="">Full Name</h3>
                      <p class=""> {{$view_message->full_name}}</p>
                  </div>
                  <div class="col-xl-6 col-md-6 col-sm-6 form-group mt-3">
                      <h3 for="content" class="">Email</h3>
                      <p class=""> {{$view_message->email}}</p>
                  </div>
                </div>
                 <div class="form-group mt-2">
                    <h3 for="content" class="">Subject</h3>
                    <p class=""> {{$view_message->subject}}</p>
                 </div>
                 <div class="form-group mt-2">
                    <h3 for="content" class="">Message</h3>
                    <div class="card">
                      <div class="card-body">
                        <p class=""> {{$view_message->message}}</p>
                      </div>
                    </div>
               </div>
                 <div class="mt-4">
                     <button wire:click="remove_button" class="btn btn-secondary">Cancel</button>
                 </div>
             </div>
             @endif
           </div>