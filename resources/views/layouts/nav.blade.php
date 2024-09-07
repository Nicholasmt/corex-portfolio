<header id="header" class="header-top">
  <div class="container">
    <h1><a href="{{ route('index') }}" class="text-capitalize"> @if(!empty($setting)) {{ $setting->full_name }}  @else  MY Name here  @endif</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      @if(!empty($setting))
        <a href="{{ route('index') }}" class="mr-auto">
            <x-curator-glider
              class="img-fluid"
              :media="$setting->logo"
              alt="logo"
              width="60" 
              height="60"
            />
        </a>
        @else
        <a href="{{ route('index') }}" style="@if(!empty($setting)) color {{ $setting->primary_color }} !important @endif" class="mr-auto fw-bold px-4">LOGO HERE</a>
      @endif
       <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link"  href="{{ route('index')}}">Home</a></li>
            <li><a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('about')}}">About</a></li>
            <li><a class="nav-link {{ (request()->is('resume')) ? 'active' : '' }}" href="{{ route('resume')}}">Resume</a></li>
            <li><a class="nav-link {{ (request()->is('services')) ? 'active' : '' }}" href="{{ route('services')}}">Services</a></li>
            <li><a class="nav-link {{ (request()->is('projects')) ? 'active' : '' }}" href="{{ route('projects')}}">Projects</a></li>
            <li><a class="nav-link {{ (request()->is('blog')) ? 'active' : '' }}" href="{{ route('blog')}}">Blog</a></li>
            @if (Session::get('authentication') == true)
              <li><a class="nav-link" href="{{ route('admin-dashboard')}}">Dashboard</a></li>  
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
  </div>
  </header> 
 
  @if(!empty($setting))
   
  <style>
      .navbar a:before{
        background-color: <?php echo $setting->primary_color ?> !important;
      } 
      .section-title h2::after{
        background: <?php echo $setting->primary_color ?> !important;
      }
      .about-me .content h3{
        color: <?php echo $setting->primary_color ?> !important;
      }
      .about-me .content ul i {
        color: <?php echo $setting->primary_color ?> !important;
      }
      .services .icon-box .icon{
        background: <?php echo $setting->primary_color ?> !important;
      }
      .services .icon-box:hover{
         background: <?php echo $setting->primary_color ?> !important;
         border-color: <?php echo $setting->secondary_color ?> !important;
      }
      .portfolio #portfolio-flters li.filter-active{
         background: <?php echo $setting->primary_color ?> !important;
      }
      .portfolio #portfolio-flters li:hover,
     .portfolio #portfolio-flters li.filter-active {
        background: <?php echo $setting->primary_color ?> !important;
     }
     .resume .resume-item::before{
         background: <?php echo $setting->primary_color ?> !important;
         border: 2px solid  <?php echo $setting->primary_color ?> !important;
     }
     .resume .resume-item h4{
      color: <?php echo $setting->primary_color ?> !important;
     }
  
  </style>
 @endif
  
 