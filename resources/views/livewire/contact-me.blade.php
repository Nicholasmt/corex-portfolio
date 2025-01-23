<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        @if(session()->has('message'))
          <div class="alert alert-success mt-4">
              <span class="text-lowercas font-bold">{{session()->get('message')}}</span>
         </div>
       @endif
      <div class="php-email-form mt-4">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" wire:model.live="name" class="form-control" id="name" placeholder="Your Name" >
              @error('name') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" wire:model.live="email" id="email" placeholder="Your Email">
              @error('email') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" wire:model.live="subject" id="subject" placeholder="Subject">
            @error('subject') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" wire:model.live="message" rows="5" placeholder="Message"></textarea>
            @error('message') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
          </div>
          {{-- <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div> --}}
          <div class="text-center mt-4" wire:loading.remove>
            <button wire:click="submit" class="btn btn-primary">Submit</button>
          </div>
          <p class="alert text-center mt-4" wire:loading>Loading please wait...</p>
        </div>
    
        
    
    </div>
    
</div>
