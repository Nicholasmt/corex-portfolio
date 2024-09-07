@extends('layouts.app')
@section('contents')
  <header id="header">
    <div class="container">
    <h1><a href="{{ route('index') }}" class="text-capitalize"> @if(!empty($setting)) {{ $setting->full_name }} @else MY name here @endif </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2> @if(!empty($setting)) {{ $setting->bio  }} @else MY Introduction message Here @endif <span style="@if(!empty($setting)) border-bottom: 2px solid {{$setting->primary_color}} !important; @endif">  @if(!empty($setting)) {{ $setting->profession  }} @else My Skill Profession Here @endif </span></h2>
       <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="{{ route('index')}}">Home</a></li>
          <li><a class="nav-link" href="{{ route('about')}}">About</a></li>
          <li><a class="nav-link" href="{{ route('resume')}}">Resume</a></li>
          <li><a class="nav-link" href="{{ route('services')}}">Services</a></li>
          <li><a class="nav-link" href="{{ route('projects')}}">Projects</a></li>
          <li><a class="nav-link" href="{{ route('blog')}}">Blog</a></li>
          @if (auth()->check())
            <li><a class="nav-link" href="{{ url('admin')}}">Dashboard</a></li>  
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
  @if(!empty($setting))
    <style>
        .navbar a:before{
           background-color: <?php echo $setting->primary_color ?> !important;
        } 
        #header .social-links a:hover {
          background: <?php echo $setting->primary_color ?> !important;
       }
       
    </style>
  @endif

@endsection

 