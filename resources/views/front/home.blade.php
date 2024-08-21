@extends('layouts.app')
@section('contents')
  <header id="header">
    <div class="container">
    <h1><a href="index.html">Nicholas Tochukwu</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>I'm a self motivated <span> Software Developer / 3D Designer</span> from Nigeria</h2>
       <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="{{ route('index')}}">Home</a></li>
          <li><a class="nav-link" href="{{ route('about')}}">About</a></li>
          <li><a class="nav-link" href="{{ route('resume')}}">Resume</a></li>
          <li><a class="nav-link" href="{{ route('services')}}">Services</a></li>
          <li><a class="nav-link" href="{{ route('portfolio')}}">Portfolio</a></li>
          <li><a class="nav-link" href="{{ route('contact')}}">Contact</a></li>
          @if (Session::get('authentication') == true)
          <li><a class="btn btn-primary" href="{{ route('admin-dashboard')}}">Dashboard</a></li>  
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      
      <div class="social-links">
        @forelse ($socials as $social)
          <a href="{{$social->url}}" class="twitter"><i class="{{$social->icon}}"></i></a>
        @empty
          No Data Found!
        @endforelse
      </div>

    </div>
  </header> 

@endsection