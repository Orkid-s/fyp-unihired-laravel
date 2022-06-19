{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/267fcdfaf1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    @livewireScripts

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @livewireStyles  
    <link rel="stylesheet" href="/css/lecturer_post_job.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <title>Document</title>
</head>
<body>
    <div class="sidebar-container">
        <div class="logo">
            <a href="">
                <img src="/assets/unihired-main-logo1.png" alt="Logo">
            </a>  
        </div>
            <ul class="sidebar-navigation ">      
                <li class="">
                    <a href="{{ route('lecturer.talents_feed') }}">
                      <i class="fa" aria-hidden="true">
                          <img class="nav-icons" src="/assets/icons-find-user.png" alt="">
                      </i> 
                      Talents Feed
                    </a>
                </li>
                <li class="mt-2">
                  <a href="{{ route('lecturer.post_job') }}">
                    <i class="fa" aria-hidden="true">
                        <img class="nav-icons" src="/assets/icons-briefcase.png" alt="">
                    </i> 
                    Post a Job
                  </a>
                </li>
                <li class="mt-2">
                  <a href="#">
                    <i class="fa" aria-hidden="true">
                        <img class="nav-icons" src="/assets/icons-radar.png" alt="">
                    </i> 
                    Job Tracker
                  </a>
                </li>
                <li class="mt-2" >
                  <a href="{{ route('lecturer.profile') }}">
                    <i class="fa" aria-hidden="true">
                        <img class="nav-icons" src="/assets/icons-male.png" alt="">
                    </i>  
                    Profile
                  </a>
                </li>
                <li class="mt-2">
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa" aria-hidden="true">
                            <img class="nav-icons" src="/assets/logout-icon.png" alt="">
                        </i>
                        {{ __('Logout') }} 
                    </a>
                                               
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">                      
                        @csrf                        
                    </form>
                </li>
            </ul> 
            <div class="container p-1" style="width: 14em;">
                <p class="name mb-0">{{ Auth::user()->first_name.' '.Auth::user()->last_name}}
                    <div class="role">
                        @if(Auth::user()->role == 1)  
                        <p>Lecturer</p>
                            @else
                            <p>Student</p>
                        @endif
                    </div></p>              
            </div>        
    </div>
    <div>
        <div>
            @livewire('lecturer-post-job-livewire')
        </div>
        
    </div>
    
</body>
</html> --}}