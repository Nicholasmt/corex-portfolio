@extends('layouts.app')
@section('contents')

@include('layouts.nav')
 <section class="section-show">
   <div class="container">
    <div class="col-lg-6 col-sm-12 col-md-12 container">
        <h4 class="text-center mt-2">Welcome back <span class="custom_text">Tochukwu!</span></h4>
        <h5 class="text-center mt-3">Admin Login</h5>
        <div class="form-floating mb-5 mt-5">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-5">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="">
              <button type="button" class="btn btn-primary btn-lg float-right">Login</button>
          </div>
       </div>
     </div>
  </section>
@endsection