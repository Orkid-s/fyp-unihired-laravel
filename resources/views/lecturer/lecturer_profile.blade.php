<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/lecturer_profile.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/267fcdfaf1.js" crossorigin="anonymous"></script>

    <title>Profile Page</title>
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
        <div class="bg-image">
            <div class="content-container">
                <div class="title-border p-3 ms-3 me-5" style="font-size: 25px">           
                    {{-- <i class="fa me-2" aria-hidden="true">
                        <img class="nav-icons ms-3" src="/assets/icons-briefcase-black.png" alt="">
                    </i> --}}         
                    <div style="margin-left: 30px; margin-top: 20px" class="d-flex justify-content-start mb-3">
                        Profile
                    </div>             
                </div>                     
            </div> 
            
            <div class="container-fluid mb-5 " id="example">
                <div class="row">
                    <div class="col">
                        <div class="panel panel-primary p-4" style="margin: 10px" >
                            <div class="panel-heading"> 
                                <div class="d-flex ">
                                    <div class="align-self-start mb-4 image-container" style="width: 10em">
                                        <img class="image" src="{{asset('storage/lecturer_profile_photo/'.$profile_details->profile_picture)}}" alt="Avatar" style="width:150px; border: 3px solid black"> 
                                    </div>
                                    <div class=" align-self-start ms-4 mt-2" style="width: 40em">
                                        <h3 style="font-weight: bold">{{$profile_details->full_name}}</h3>
                                        @if ($profile_details->college_dept == 'CES')
                                            <p>College of Energy Economics and Social Sciences (CES)</p>
                                            @elseif ($profile_details->college_dept == 'CCI')
                                                <p>College of Computing and Informatics (CCI)</p>
                                            @elseif ($profile_details->college_dept == 'COE')
                                                <p>College of Engineering (COE)</p>
                                            @elseif ($profile_details->college_dept == 'COBA')
                                                <p>College of Business Management and Accounting (COBA)</p>
                                            @else
                                            <p>College of Graduate Studies (COGS)</p>
                                        @endif
                                        <div style="font-size:12px">
                                            <p>{{$profile_details->description}}</p>
                                        </div>
                                    </div> 
                                </div>   
                                <div style="font-size: 13px; font-weight: bold">
                                    <p>Upload Profile Photo</p>
                                    <hr>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 10px">
                                            <strong style="font-size: 11px">{{ $message }}</strong>
                                            <button type="button" class="btn-close" style="padding: 13px" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('lecturer.store.upload.photo') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input style="font-size: 12px" type="file" class="form-control" required name="profile_picture" id="profile_picture">
                                        @error('profile_picture') <span style="font-size: 13px; font-weight: bold" class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        <div class="d-flex justify-content-end">
                                            <button style="font-size: 12px" type="submit" class="btn btn-primary text-end mt-3 mb-4"> Upload Photo </button>
                                        </div>
                                    
                                </div>
                            </div> 
        
                                <div class="panel panel-primary p-4 lecturer-details">
                                    <div class="panel-heading" style=" font-size:12px">
                                        <h6 style="font-weight: bold; color: #1A4977">Personal Details</h6>
                                        <hr>
                                        <div class="d-flex justify-content-start mb-2">
                                            <div>
                                                <p class="head-details">First Name</p>
                                                <p>{{$profile->first_name}}</p>
                                            </div>
                                            <div style="margin-left: 171px">
                                                <p class="head-details">Last Name</p>
                                                <p>{{$profile->last_name}}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="head-details">Gender</p>
                                                <p>{{$profile_details->gender}}</p>
                                            </div>
                                            <div>
                                                <p class="head-details">Date of Birth</p>
                                                <p>{{$profile_details->DOB}}</p>
                                            </div>
                                            <div>
                                                <p class="head-details">Age</p>
                                                <p>{{$profile_details->age}}</p>
                                            </div>
                                            <div>
                                                <p class="head-details">Phone Number</p>
                                                <p>{{$profile_details->phone}}</p>
                                            </div> 
                                        </div>     
                                    </div>
                                </div>
                                <br>
                                <div class="panel panel-primary p-4 lecturer-details">
                                    <div class="panel-heading" style=" font-size:12px">
                                        <h6 style="font-weight: bold; color: #1A4977">Professional Details</h6>
                                        <hr>
                                        <div class="d-flex justify-content-start flex-gap mb-2">
                                            <div>
                                                <p class="head-details">Position</p>
                                                <p>{{$profile_details->position}}</p>
                                            </div>
                                            <div {{-- style="margin-left: 182px" --}}>
                                                <p class="head-details">Room No</p>
                                                <p>{{$profile_details->room_no}}</p>
                                            </div>
                                            <div>
                                                <p class="head-details">Office Contact Number</p>
                                                <p>{{$profile_details->office_contact}}  Ext: {{$profile_details->ext}}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start mb-2">
                                            <div>
                                                <p class="head-details">Email</p>
                                                <p>{{$profile->email}}</p>
                                            </div>
                                             
                                        </div> 
                                        
                                    </div>
                                </div>
                                <br>
                                <div class="panel panel-primary p-4 lecturer-details">
                                    <div class="panel-heading" style=" font-size:12px">
                                        <h6 style="font-weight: bold; color: #1A4977">Academic Qualifications</h6>
                                        <hr>
                                        <table>
                                            <tr>
                                                <th>
                                                    <p class="head-details">Level of Education</p>
                                                </th>
                                                <th>
                                                    <p class="head-details">University/College Name</p>
                                                </th>
                                                <th>
                                                    <p class="head-details">Major</p>
                                                </th>
                                                <th>
                                                    <p class="head-details">Year</p>
                                                </th>
                                            </tr>
                                            @foreach ($lecturer_academic as $academic)
                                                <tr>
                                                    <td>
                                                        <p>{{$academic->level_education}}</p>
                                                    </td>
                                                    <td>
                                                        {{$academic->uni_name}}, {{$academic->country_of_uni}}
                                                    </td>
                                                    <td>
                                                        {{$academic->major}}
                                                    </td>
                                                    <td>
                                                        {{$academic->from_year}}-{{$academic->until_year}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> {{-- end of row --}}
                    </div> {{-- end of row --}}
                </div> {{-- end of row --}}
            </div> {{-- end of list of jobs --}}
        </div>  {{-- end of rounded form container --}}       
    </body>
</html>