<div class="card-body">
    <h4 class="text-center">Manage Profile</h4>
    <div class="row container">
        <div class="col-xl-6 col-md-12 col-sm-12">
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
            <div class="form-group mt-3 float-end">
                <button wire:click="" class="btn btn-primary">Save Change</button>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 col-sm-12">
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
                <label for="name">confirm Password</label>
                <input type="password" wire:model.defer="confirm_pass" class="form-control mt-2">
                @error('confirm_pass') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="form-group mt-3 float-end">
                <button wire:click="" class="btn btn-primary">Save Change</button>
            </div>
        </div>
    </div>
    
</div>