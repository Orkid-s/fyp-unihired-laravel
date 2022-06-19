<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/student_find_jobs.css">
    
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/267fcdfaf1.js" crossorigin="anonymous"></script>

    <title>Find Jobs</title>
</head>
<body>
    <div class="sidebar-container">
        <div class="logo">
            <a href="">
                <img src="/assets/unihired-main-logo2.png" alt="Logo">
            </a>  
        </div>
            <ul class="sidebar-navigation ">      
                <li class="">
                    <a href="{{ route('student.find_jobs') }}">
                      <i class="fa" aria-hidden="true">
                          <img class="nav-icons" src="/assets/icons-find-user.png" alt="">
                      </i> 
                      Find Jobs
                    </a>
                  </li>
                <li class="mt-2">
                  <a href="{{ route('student.job.tracker') }}">
                    <i class="fa" aria-hidden="true">
                        <img class="nav-icons" src="/assets/icons-radar.png" alt="">
                    </i> 
                    Job Tracker
                  </a>
                </li>
                <li class="mt-2" >
                  <a href="{{ route('student.profile') }}">
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

    <div class="bg-image">
        <div class="content-container">
            <div class="title-border p-3 ms-3 me-5" style="font-size: 25px">                   
                <div style="margin-left: 30px; margin-top: 20px" class="d-flex justify-content-start">
                    Find Jobs
                    <div class="d-flex justify-content-start ms-5 col-6">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search..." style="font-size: 12px">
                        <button type="button" class="btn btn-primary ms-4" data-bs-dismiss="modal" style="font-size: 12px">Search</button>
                    </div>
                </div>             
            </div>   
        </div> 
        <br>
        <div class="form-container rounded ">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($message = Session::get('already-applied'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="container-fluid mb-5" id="example">
                @foreach($list_jobs as $job)
                    <div class="row">
                        <div class="col">
                            <div class="panel panel-primary p-4">
                                <div class="panel-heading">
                                    {{-- <h1>{{$job->id}}</h1> --}}
                                    <h3 class="panel-job-title">{{$job->id}}. {{$job->job_title}}</h3>
                                    <p class="panel-job-brief">{{$job->job_brief}}</p>

                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                              <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-size: 14px">
                                                Job Details
                                              </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                              <div class="accordion-body">
                                                  <ul>
                                                      <li>
                                                        <p>Job Responsibilities: {{$job->job_responsibilities}}</p>
                                                      </li>
                                                      <li>
                                                        <p>Number of Recruitment: {{$job->num_of_recruitment}}</p>
                                                      </li>
                                                      <li>
                                                        <p>Allowance: RM {{$job->allowance}}</p>
                                                      </li>
                                                      <li>
                                                        <p>Duration: {{$job->job_duration}} {{$job->job_duration_type}}</p>
                                                      </li>
                                                      <li>
                                                        <p>
                                                            Start Date: {{$job->start_date}}
                                                            End Date: {{$job->end_date}}</p>
                                                        </p>
                                                      </li>
                                                      <li>
                                                        <p>Location: {{$job->work_location}}</p>
                                                      </li>
                                                      <li>
                                                        <p>College Department: {{$job->college_dept}}</p>
                                                      </li>
                                                      <li>
                                                        <p>Language: {{$job->language_name}}</p>
                                                      </li>
                                                      <li>
                                                        <p>Required Language Level: {{$job->language_level}}</p>
                                                      </li>     
                                                      <li>
                                                        <p>Required Skills: {{$job->skills_name}}</p>
                                                      </li>       
                                                  </ul>                                   
                                              </div>
                                            </div>
                                          </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="font-size: 14px">
                                              Project Research Details
                                            </button>
                                          </h2>
                                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li>  
                                                        @foreach ($lecturers as $lecturer)
                                                            @if($job->user_id == $lecturer->user_id)
                                                                <p>
                                                                    Lecturer: 
                                                                    <a href="student-view-lecturer-profile/{{$lecturer->user_id}}">
                                                                        {{$lecturer->full_name}}
                                                                    </a>
                                                                </p>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    <li>
                                                        <p>Title of Research Project: 
                                                            {{$job->title_research_project}}
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>Research Project Brief: 
                                                            {{$job->research_project_brief}}
                                                        </p>
                                                    </li>
                                                </ul>      
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="text-start ms-4">
                                    <p>Posted at: {{$job->created_at->format('d-M-Y')}}</p>
                                </div>
                                <div class="text-end me-4">
                                    <a href="successful-applied-job/{{$job->id}}" class="btn btn-primary" style="font-size: 12px">Apply</a>
                                </div>                                  
                            </div>   
                        </div> {{-- end of column --}}
                    </div> {{-- end of row --}}
                @endforeach
            </div> {{-- end of list of jobs --}}
        </div>  {{-- end of rounded form container --}}
    </div>
</body>
</html>
                
