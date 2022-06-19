<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/student_find_jobs.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/267fcdfaf1.js" crossorigin="anonymous"></script>

    <title>Document</title>
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

    @if(Session::has('success'))
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
    @endif

    <div class="bg-image">
        <div class="content-container">
            <div class="title-border p-2 ms-4 me-5 mt-1" style="font-size: 25px; width: 250px;">           
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
                  <button class="nav-link active position-relative" id="invited-tab" style="color: #FFA82C" data-bs-toggle="tab" data-bs-target="#invited" type="button" role="tab" aria-controls="invited" aria-selected="true">
                    Invited
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                        {{$list_invited}}
                    </span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative" id="toBeHired-tab" data-bs-toggle="tab" style="color: #FFA82C" data-bs-target="#toBeHired" type="button" role="tab" aria-controls="toBeHired" aria-selected="false">
                    To Be Hired
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                        {{$list_applied}}
                    </span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative" id="accepted-tab" data-bs-toggle="tab" style="color: #FFA82C" data-bs-target="#accepted" type="button" role="tab" aria-controls="accepted" aria-selected="false">
                    Ongoing
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                        {{$list_ongoing}}
                    </span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative" id="completed-tab" data-bs-toggle="tab" style="color: #FFA82C" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">
                        Completed
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                            {{$list_completed}}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative" id="rejected-tab" data-bs-toggle="tab" style="color: #FFA82C" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">
                        Rejected
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                            {{$list_rejected}}
                        </span>
                    </button>
                </li>
            </ul>
              <div class="tab-content mt-4 mb-4 p-1" id="myTabContent">

                {{-- Tab 1: Invited Jobs --}}  
                <div class="tab-pane fade show active" id="invited" role="tabpanel" aria-labelledby="invited-tab">
                    <div class="container-fluid mb-5" id="example">
                        @foreach($invited_jobs->many_job as $jobs)
                            @if ($jobs->pivot->status == '1')
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <h3 class="panel-job-title">{{$jobs->job_title}}</h3>
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingTwo">
                                                            <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-size: 14px">
                                                                Details
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h6 style="font-weight:bold" class="mt-3 mb-3">Job Details</h6>
                                                            <ul>
                                                                <li>
                                                                    <p>Job Brief: {{$jobs->job_brief}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Job Responsibilities: {{$jobs->job_responsibilities}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Employment Type: {{$jobs->employment_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Number of Recruitment: {{$jobs->num_of_recruitment}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Allowance: RM {{$jobs->allowance}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Duration: {{$jobs->job_duration}} {{$jobs->job_duration_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>
                                                                        Start Date: {{$jobs->start_date}}
                                                                        End Date: {{$jobs->end_date}}</p>
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p>Location: {{$jobs->work_location}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>College Department: {{$jobs->college_dept}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Language: {{$jobs->language_name}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Required Language Level: {{$jobs->language_level}}</p>
                                                                </li>          
                                                            </ul>  
                                                            <h6 style="font-weight:bold" class="mb-3 mt-4">Project Research Details</h6>   
                                                                <ul>
                                                                    <li>
                                                                        <p>Title of Research Project: 
                                                                            {{$jobs->title_research_project}}
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Research Project Brief: 
                                                                            {{$jobs->research_project_brief}}
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
                                                <p>Invited on: {{$jobs->pivot->created_at->format('d-M-Y')}}</p>
                                            </div>
                                            <div class="d-flex flex-row-reverse bd-highlight mt-4">
                                                <div class="text-end me-4">
                                                    <a href="accept-job-invitation/{{$jobs->id}}" class="btn btn-primary" style="font-size: 12px">Accept</a>
                                                </div>   
                                                <div class="text-end me-3">
                                                    <a href="reject-job-invitation/{{$jobs->id}}" class="btn btn-danger" style="font-size: 12px">Reject</a>
                                                </div>    
                                            </div>
                                        </div>   
                                    </div> {{-- end of column  --}}
                                </div>  {{-- end of row  --}}
                            @endif
                        @endforeach
                    </div>  {{-- end of list of jobs --}} 
                </div>
            
                {{-- Tab 2: To Be Hired Jobs --}}               
                <div class="tab-pane fade" id="toBeHired" role="tabpanel" aria-labelledby="toBeHired-tab">              
                    <div class="container-fluid mb-5" id="example">
                        @foreach($applied_jobs->many_job as $job)
                            @if ($job->pivot->status == '2')
                                <div class="row">
                                    @if ($message = Session::get('withdraw-success'))
                                        <div class="alert alert-success alert-dismissible fade show" style="padding: 10px" role="alert">
                                            <strong style="font-size: 11px">{{ $message }}</strong>
                                            <button type="button" class="btn-close" style="padding: 13px" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h3 class="panel-job-title">{{$job->job_title}}</h3>
                                                    <div >
                                                        <a href="student-withdraw-job-application/{{$job->id}}" class="btn btn-primary ms-3" style="font-size: 11px; color: white">Withdraw Application</a>
                                                    </div>
                                                </div>
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingTwo">
                                                            <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-size: 14px">
                                                                Details
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h6 style="font-weight:bold" class="mt-3 mb-3">Job Details</h6>
                                                            <ul>
                                                                <li>
                                                                    <p>Job Brief: {{$job->job_brief}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Job Responsibilities: {{$job->job_responsibilities}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Employment Type: {{$job->employment_type}}</p>
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
                                                            </ul>  
                                                            <h6 style="font-weight:bold" class="mb-3 mt-4">Project Research Details</h6>   
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
                                            </div> 
                                        </div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <div class="text-start ms-4">
                                                <p>Applied on: {{$job->pivot->created_at->format('d-M-Y')}}</p>
                                            </div>
                                            <div class="text-end me-4">
                                                <p style="font-size: 11px">Please wait for the lecturer to accept your application.</p>
                                            </div>                                  
                                        </div>   
                                    </div> {{-- end of column --}}
                                </div> {{-- end of row --}}
                            @endif
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div> {{-- end of tab content --}}

                {{-- Tab 3: Ongoing Jobs --}}
                <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                    <div class="container-fluid" id="example">
                        @foreach($ongoing_jobs->many_job as $myjob)
                            @if ($myjob->pivot->status == '3') 
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <h3 class="panel-job-title">{{$myjob->job_title}}</h3>
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingTwo">
                                                        <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-size: 14px">
                                                            Details
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h6 style="font-weight:bold" class="mt-3 mb-3">Job Details</h5>
                                                            <ul>
                                                                <li>
                                                                    <p>Job Brief: {{$myjob->job_brief}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Job Responsibilities: {{$myjob->job_responsibilities}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Employment Type: {{$myjob->employment_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Number of Recruitment: {{$myjob->num_of_recruitment}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Allowance: RM {{$myjob->allowance}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Duration: {{$myjob->job_duration}} {{$myjob->job_duration_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>
                                                                        Start Date: {{$myjob->start_date}}
                                                                        End Date: {{$myjob->end_date}}</p>
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p>Location: {{$myjob->work_location}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>College Department: {{$myjob->college_dept}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Language: {{$myjob->language_name}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Required Language Level: {{$myjob->language_level}}</p>
                                                                </li>          
                                                            </ul>  
                                                            <h6 style="font-weight:bold" class="mb-3 mt-4">Project Research Details</h5>   
                                                                <ul>
                                                                    <li>
                                                                        <p>Title of Research Project: 
                                                                            {{$myjob->title_research_project}}
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Research Project Brief: 
                                                                            {{$myjob->research_project_brief}}
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
                                                <p>Accepted on: {{$myjob->pivot->updated_at->format('d-M-Y')}}</p>
                                            </div>                                  
                                        </div>   
                                    </div>  {{-- end of column  --}}
                                </div> {{-- end of row --}} 
                            @endif
                        @endforeach
                    </div>  {{-- end of list of jobs  --}}
                </div>
    
                {{-- Tab 4: Completed Jobs --}}               
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">              
                    <div class="container-fluid mb-5" id="example">
                        @foreach($completed_jobs->many_job as $job_detail)
                            @if ($job_detail->pivot->status == '4')
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <h3 class="panel-job-title">{{$job_detail->job_title}}</h3>
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingTwo">
                                                            <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-size: 14px">
                                                                Details
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h6 style="font-weight:bold" class="mt-3 mb-3">Job Details</h6>
                                                            <ul>
                                                                <li>
                                                                    <p>Job Brief: {{$job_detail->job_brief}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Job Responsibilities: {{$job_detail->job_responsibilities}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Employment Type: {{$job_detail->employment_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Number of Recruitment: {{$job_detail->num_of_recruitment}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Allowance: RM {{$job_detail->allowance}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Duration: {{$job->job_duration}} {{$job_detail->job_duration_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>
                                                                        Start Date: {{$job_detail->start_date}}
                                                                        End Date: {{$job_detail->end_date}}</p>
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p>Location: {{$job_detail->work_location}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>College Department: {{$job_detail->college_dept}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Language: {{$job_detail->language_name}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Required Language Level: {{$job_detail->language_level}}</p>
                                                                </li>          
                                                            </ul>  
                                                            <h6 style="font-weight:bold" class="mb-3 mt-4">Project Research Details</h6>   
                                                                <ul>
                                                                    <li>
                                                                        <p>Title of Research Project: 
                                                                            {{$job_detail->title_research_project}}
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Research Project Brief: 
                                                                            {{$job_detail->research_project_brief}}
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
                                                <p>Completed on: {{$job_detail->pivot->updated_at->format('d-M-Y')}}</p>
                                            </div>
                                            <div class="text-end me-4">
                                                <p style="color: green">Congratulations! Your job has already completed.</p>
                                            </div>                                  
                                        </div>   
                                    </div>  {{-- end of column  --}}
                                </div>  {{-- end of row  --}}
                            @endif
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div> {{-- end of tab content --}}

                {{-- Tab 5: Rejected Jobs --}}               
                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">              
                    <div class="container-fluid mb-5" id="example">
                        @foreach($rejected_jobs->many_job as $rejected)
                            @if ($rejected->pivot->status == '5')
                                <div class="row">
                                    <div class="col">
                                        <div class="panel panel-primary p-4">
                                            <div class="panel-heading">
                                                <h3 class="panel-job-title">{{$rejected->job_title}}</h3>
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingTwo">
                                                        <button class="accordion-button collapsed panel-research-details" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-size: 14px">
                                                            Details
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h6 style="font-weight:bold" class="mt-3 mb-3">Job Details</h5>
                                                            <ul>
                                                                <li>
                                                                    <p>Job Brief: {{$rejected->job_brief}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Job Responsibilities: {{$rejected->job_responsibilities}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Employment Type: {{$rejected->employment_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Number of Recruitment: {{$rejected->num_of_recruitment}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Allowance: RM {{$rejected->allowance}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Duration: {{$rejected->job_duration}} {{$rejected->job_duration_type}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>
                                                                        Start Date: {{$rejected->start_date}}
                                                                        End Date: {{$rejected->end_date}}</p>
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p>Location: {{$rejected->work_location}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>College Department: {{$rejected->college_dept}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Language: {{$rejected->language_name}}</p>
                                                                </li>
                                                                <li>
                                                                    <p>Required Language Level: {{$rejected->language_level}}</p>
                                                                </li>          
                                                            </ul>  
                                                            <h6 style="font-weight:bold" class="mb-3 mt-4">Project Research Details</h6>   
                                                                <ul>
                                                                    <li>
                                                                        <p>Title of Research Project: 
                                                                            {{$rejected->title_research_project}}
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Research Project Brief: 
                                                                            {{$rejected->research_project_brief}}
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
                                                <p>Rejected on: {{$rejected->pivot->updated_at->format('d-M-Y')}}</p>
                                            </div>
                                        </div>   
                                    </div> {{-- end of column --}}
                                </div> {{-- end of row --}}
                            @endif
                        @endforeach
                    </div> {{-- end of list of jobs --}}
                </div> {{-- end of tab content --}}
            </div>
        </div>
</body>