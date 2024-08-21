<div>
<section class="section-show">
  <div class="container">
  <div class="col-lg-6 col-sm-12 col-md-12 container mb-5">
        <h4 class="text-center mt-2">Welcome back <span class="custom_text">Tochukwu!</span></h4>
        <h5 class="text-center mt-3">Admin Login</h5>
        @if(Session::has('success'))
        <div class="alert alert-success">
        <span class="text-capitalize font-bold">{{session()->get('success')}}</span>
        </div>
        @elseif(Session::has('error'))
          <div class="alert alert-danger">
            <span class="text-capitalize font-bold">{{session()->get('error')}}</span>
          </div>
        @endif
        <div class="form-floating mb-5 mt-5">
            <input type="email" class="form-control" wire:model="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            @error('email') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" wire:model="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password') <span class="text-danger font_13 text-capitalize">{{$message}}</span> @enderror
        </div>
        <div class="float-end">
            <button  wire:click.prevent="auth" class="btn btn-primary btn-lg float-right">Login</button>
        </div>
    </div>
    </div>
</section>
</div>

@push('scripts')


@endpush
