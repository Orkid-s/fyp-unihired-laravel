<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/lecturer_job_tracker.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
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
            </div></p>              
        </div>        
    </div>
    
    <div class="bg-image">
        <div class="content-container">
            <div class="title-border p-2 ms-4 me-3 mt-1 " style="font-size: 25px; width: 250px">           
                {{-- <i class="fa me-2" aria-hidden="true">
                    <img class="nav-icons ms-3" src="/assets/icons-briefcase-black.png" alt="">
                </i> --}}         
                <div style="margin-left: 30px; margin-top: 20px" class="d-flex justify-content-start">
                    Job Tracker
                </div>             
            </div>   
        </div> 
        <br>
        <div class="form-container rounded">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 12px">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active position-relative" id="invited-tab" style="color: #1A4977" data-bs-toggle="tab" data-bs-target="#invited" type="button" role="tab" aria-controls="invited" aria-selected="true">Invited</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative" id="toBeHired-tab" data-bs-toggle="tab" style="color: #1A4977" data-bs-target="#toBeHired" type="button" role="tab" aria-controls="toBeHired" aria-selected="false">
                    To Be Hired
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                        {{$list_tobehired_job}}
                    </span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative" id="accepted-tab" data-bs-toggle="tab" style="color: #1A4977" data-bs-target="#accepted" type="button" role="tab" aria-controls="accepted" aria-selected="false">
                    Ongoing
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                        {{$list_accepted_job}}
                    </span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative" id="completed-tab" data-bs-toggle="tab" style="color: #1A4977" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">
                        Completed
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                            {{$list_completed_job}}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" style="color: #1A4977" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">
                        Rejected
                        {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                            {{$list_rejected_job}}
                        </span> --}}
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-4 mb-4 p-1" id="myTabContent">

                {{-- Tab 1: invited Jobs --}}
                <div class="tab-pane fade show active" id="invited" role="tabpanel" aria-labelledby="invited-tab">
                </div>

                {{-- Tab 2: toBeHired Jobs --}}
                <div class="tab-pane fade" id="toBeHired" role="tabpanel" aria-labelledby="toBeHired-tab">
                    <div class="container-fluid mb-5" id="example">
                        @foreach ($post_job as $job)
                            @if ($job->job_status == '2')
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <div class="d-flex justify-content-between">
                                                    <h6 style="font-weight: bold">{{$job->job_title}}</h6>
                                                    <div class="text-end">
                                                        <a href="list-applied-applicants/{{$job->id}}" class="btn btn-primary" style="font-size: 12px">
                                                            View Applicants
                                                        </a>
                                                        <a href="lecturer-quota-recruitment-completed/{{$job->id}}" class="btn button1 ms-2" style="font-size: 12px; ">Done</a>   
                                                    </div>
                                                </div>
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
                                                <div class="d-flex justify-content-between ">
                                                    <p class="mt-2 mb-0">Posted on: {{$job->created_at->format('d-M-Y')}}</p>
                                                    <p class="mt-2 mb-0">If you have met the quota for a job recruiting, click 'Done' button.</p> 
                                                </div>
                                            </div> 
                                        </div>

                                        {{-- <div class="d-flex justify-content-between mb-3">
                                            <div class="text-start ms-4">
                                                <p>Applied at: {{$job->created_at->format('d-M-Y')}}</p>
                                            </div>
                                            <div class="text-end me-4">
                                                <a href="successful-applied-job/{{$job->id}}" class="btn btn-primary" style="font-size: 12px">Apply</a>
                                            </div>                                  
                                        </div> --}}   
                                    </div> {{-- end of column --}}
                                </div> {{-- end of row --}}
                            @endif
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div>

                {{-- Tab 3: Ongoing Jobs --}}
                <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                    <div class="container-fluid mb-5" id="example">
                        @foreach ($post_job as $job)
                            @if ($job->job_status == '3')
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <div class="d-flex justify-content-between">
                                                    <h6 style="font-weight: bold">{{$job->job_title}}</h6>
                                                    <div class="text-end">
                                                        <a href="lecturer-job-completed/{{$job->id}}" class="btn btn-success" style="font-size: 12px">
                                                            Completed
                                                        </a>
                                                        {{-- <a href="lecturer-quota-recruitment-completed/{{$job->id}}" class="btn button1 ms-2" style="font-size: 12px; ">Done</a>   --}} 
                                                    </div>
                                                </div>
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
                                                                    <li>
                                                                        <p>Posted on: {{$job->created_at->format('d-M-Y')}}</p>
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
                                                <div class="d-flex justify-content-between ">
                                                    <a href="lecturer-view-hired-applicants/{{$job->id}}" class="mt-2" >
                                                        View Hired Applicants
                                                    </a>
                                                    <p class="mt-2 mb-0">If the job is finished, click the 'Completed' button.</p> 
                                                </div>
                                            </div> 
                                        </div>
                                    </div> {{-- end of column --}}
                                </div> {{-- end of row --}}
                            @endif
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div>

                {{-- Tab 4: completed Jobs --}}
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <div class="container-fluid mb-5" id="example">
                        @foreach ($post_job as $job)
                            @if ($job->job_status == '4')
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <div class="d-flex justify-content-between">
                                                    <h6 style="font-weight: bold">{{$job->job_title}}</h6>
                                                </div>
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
                                                <div class="d-flex justify-content-between ">
                                                    <p class="mt-2 mb-0">Completed on: {{$job->updated_at->format('d-M-Y')}}</p>
                                                    <a href="lecturer-completed-hired-applicants/{{$job->id}}" class="mt-2" >
                                                        View Hired Applicants
                                                    </a>
                                                </div>
                                            </div> 
                                        </div>

                                        {{-- <div class="d-flex justify-content-between mb-3">
                                            <div class="text-start ms-4">
                                                <p>Applied at: {{$job->created_at->format('d-M-Y')}}</p>
                                            </div>
                                            <div class="text-end me-4">
                                                <a href="successful-applied-job/{{$job->id}}" class="btn btn-primary" style="font-size: 12px">Apply</a>
                                            </div>                                  
                                        </div> --}}   
                                    </div> {{-- end of column --}}
                                </div> {{-- end of row --}}
                            @endif
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div>

                {{-- Tab 5: rejected Jobs --}}
                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                    <div class="container-fluid mb-5" id="example">
                        @foreach ($post_job as $job)
                            <div class="row">
                                <div class="col">
                                    <div class="panel panel-primary p-4">
                                        <div class="panel-heading">
                                            <div class="d-flex justify-content-between">
                                                <h6 style="font-weight: bold">{{$job->job_title}}{{$job->job_title}}</h6>
                                            </div>
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
                                            <div class=" text-end">
                                                <a href="lecturer-view-rejected-applicants/{{$job->id}}" class="mt-2 " >
                                                    View Rejected Applicants
                                                </a>
                                            </div>
                                        </div> 
                                    </div>

                                    {{-- <div class="d-flex justify-content-between mb-3">
                                        <div class="text-start ms-4">
                                            <p>Applied at: {{$job->created_at->format('d-M-Y')}}</p>
                                        </div>
                                        <div class="text-end me-4">
                                            <a href="successful-applied-job/{{$job->id}}" class="btn btn-primary" style="font-size: 12px">Apply</a>
                                        </div>                                  
                                    </div> --}}   
                                </div> {{-- end of column --}}
                            </div> {{-- end of row --}}
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div>
            </div> {{-- end of tab content --}}
        </div>

        
<body>