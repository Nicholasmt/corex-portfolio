<div class="card-body">
    @if(Session::has('message'))
      <div class="alert alert-success">
        <span class="text-capitalize font-bold">{{session()->get('message')}}</span>
      </div>
      @elseif(Session::has('error'))
      <div class="alert alert-danger">
        <span class="text-capitalize font-bold">{{session()->get('error')}}</span>
      </div>
      @endif
    <h4 class="text-center">Manage Profile</h4>
    <div class="row containe">
        <div class="col-xl-6 col-md-12 col-sm-12 mt-4">
            <h5 class="text-center">Personal Information Update</h5>
            <div class="form-group mt-4">
                <label for="name">Full Name</label>
                <input type="text" wire:model.defer="name" class="form-control mt-2">
                @error('name') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="name">Email</label>
                <input type="email" wire:model.defer="email" class="form-control mt-2">
                @error('email') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-3 float-end mb-3">
                <button wire:click="personal_info" class="btn btn-primary">Save Change</button>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 col-sm-12 mt-4">
            <h5 class="text-center">Security Information Update</h5>
            <div class="form-group mt-4">
                <label for="name">Old Password</label>
                <input type="password" wire:model.defer="old_pass" class="form-control mt-2">
                @error('old_pass') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="name">New Password</label>
                <input type="password" wire:model.defer="new_pass" class="form-control mt-2">
                @error('new_pass') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="name">Confirm Password</label>
                <input type="password" wire:model.defer="confirm_pass" class="form-control mt-2">
                @error('confirm_pass') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-3 float-end">
                <button wire:click="password" class="btn btn-primary">Save Change</button>
            </div>
        </div>
    </div>
    
</div>