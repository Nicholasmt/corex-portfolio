<div>
    <div class="">
        @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
        @endif
    </div>
    <div class="row">Your Comment</h3>
        <div class="form-group mt-3">
           <input type="text" class="form-control" wire:model.live="name" id="name" placeholder="Full Name">
          @error('name') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" wire:model.live="message" rows="5" placeholder="Message"></textarea>
          @error('message') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
        </div>
        <div class="text-center mt-4" wire:loading.remove>
          <button wire:click="save" class="btn btn-primary">Submit</button>
        </div>
        <p class="alert text-center mt-4" wire:loading>loading please wait...</p>
      </div>
</div>
