<header id="header" class="header-top">
    <div class="container">
    <h1><a href="index.html">Nicholas Tochukwu</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
       <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="{{ route('index')}}">Home</a></li>
          <li><a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('about')}}">About</a></li>
          <li><a class="nav-link {{ (request()->is('resume')) ? 'active' : '' }}" href="{{ route('resume')}}">Resume</a></li>
          <li><a class="nav-link {{ (request()->is('services')) ? 'active' : '' }}" href="{{ route('services')}}">Services</a></li>
          <li><a class="nav-link {{ (request()->is('projects')) ? 'active' : '' }}" href="{{ route('projects')}}">Projects</a></li>
          <li><a class="nav-link {{ (request()->is('blog')) ? 'active' : '' }}" href="{{ route('blog')}}">Blog</a></li>
          @if (Session::get('authentication') == true)
          <li><a class="btn btn-primary" href="{{ route('admin-dashboard')}}">Dashboard</a></li>  
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
  </div>
  </header> 