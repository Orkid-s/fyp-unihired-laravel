<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/lecturer_talents_feed.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/267fcdfaf1.js" crossorigin="anonymous"></script>

    <title>Job Tracker</title>
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
                <a href="{{ route('lecturer.job.tracker') }}">
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
                </div>
            </p>              
        </div>        
    </div>
    
    {{-- @if(Session::has('success'))
        <script type="text/javascript">
            swal({
                title:'Success!',
                text:"{{Session::get('success')}}",
                timer:5000,
                type:'success'
            }).then((value) => {
            //location.reload();
            }).catch(swal.noop);
        </script>
    @endif --}}

    <div class="bg-image">
        <div class="content-container">
            <div class="title-border p-2 ms-4 me-3 mt-1 " style="font-size: 25px; width: 40em">                 
                <div style="margin-left: 30px; margin-top: 20px" class="d-flex justify-content-start">
                    Talents Feed
                    {{-- <div class="d-flex justify-content-start ms-5 col-6">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search..." style="font-size: 12px">
                        <button type="button" class="btn btn-primary ms-4" data-bs-dismiss="modal" style="font-size: 12px">Search</button>
                    </div> --}}
                </div>             
            </div>   
        </div> 
        <br>
        <div class="form-container rounded">
            <div class="container-fluid mb-5" id="example">
                @foreach($list_talents as $talent)
                    <div class="row">
                        <div class="box">
                            <div class="panel panel-primary p-3 mt-2">
                                <div class="panel-heading">
                                    <div class="row" >
                                        <div class="col-2 mb-4">
                                            <img class="avatar-image" src="/assets/img_avatar.png" alt="Avatar" style="width:110px"> 
                                        </div>
                                        <div class="col-10">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="panel-job-title">{{$talent->full_name}}</h3>
                                                <div class="text-end button2">
                                                    <a {{-- href="successful-applied-job/{{$talent->id}}" --}} class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" style="font-size: 12px">Invite for Job</a>
                                                </div> 
                                            </div>
                                            <div style="font-weight: bold">
                                                @if ($talent->college == 'CES')
                                                    <p>College of Energy Economics and Social Sciences (CES)</p>
                                                    @elseif ($talent->college == 'CCI')
                                                        <p>College of Computing and Informatics (CCI)</p>
                                                    @elseif ($talent->college == 'COE')
                                                        <p>College of Engineering (COE)</p>
                                                    @elseif ($talent->college  == 'COBA')
                                                        <p>College of Business Management and Accounting (COBA)</p>
                                                    @else
                                                    <p>College of Graduate Studies (COGS)</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <i class="fa" aria-hidden="true">
                                                    <img class="nav-icons" src="/assets/icons-location-100.png" alt="">
                                                </i> 
                                                {{$talent->town}}, {{$talent->city}}, {{$talent->state}}
                                                
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                                <i class="fa" aria-hidden="true">
                                                    <img class="nav-icons" src="/assets/icons-language-100.png" alt="">
                                                </i> 
                                                @foreach($list_language as $language)
                                                    @if ($talent->user_id == $language->user_id)
                                                        {{$language->language_name}} ({{$language->language_level}})
                                                    @endif
                                                @endforeach
                                            </div>
                                            
                                            <p class="panel-job-brief">{{$talent->description}}</p>

                                            <div class="d-flex justify-content-start">
                                                @foreach($list_skills as $skills)
                                                    @if ($talent->user_id == $skills->user_id)
                                                    <div class="panel-skills rounded-pill mb-2 me-2">
                                                        {{$skills->skills_name}}
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div> {{-- end of row --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<body>