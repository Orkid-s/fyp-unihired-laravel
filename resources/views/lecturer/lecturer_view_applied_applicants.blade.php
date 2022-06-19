<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/lecturer_view_applied_applicants.css">
    
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
            </div></p>              
        </div>        
    </div>

    <div class="bg-image">
        <div class="content-container">
            <div class="title-border p-2 ms-4 me-3 mt-1 " style="font-size: 25px; width: 400px">                  
                <div style="margin-left: 30px; margin-top: 20px" class="d-flex justify-content-start back-icon">
                    <a href="{{ route('lecturer.job.tracker') }}" style="font-size: 12px; color: black;">
                        <i class="fa" aria-hidden="true">
                            <img class="nav-back" src="/assets/icons-back-100.png" alt="">
                        </i> 
                        Back to Job Tracker 
                        
                    </a>
                </div> 
                <div class="d-flex justify-content-between" style="width: 42.3em">
                    <div class="d-flex flex-column bd-highlight">
                        <p style="font-size: 16px; margin-left: 43px" class="mt-5 mb-0">List of Applied Applicants</p>
                        <p style="font-size: 10px; margin-left: 43px" class="mt-1 mb-0">Click on 'View Profile' button to view applicant's profile.</p>
                    </div>
                    {{-- @foreach ($list_applicant->appliedJobs as $user)
                        @foreach ($check as $check_num)
                            @if($user->pivot->lecturer_post_job_id == $check_num->id)
                                <p style="font-size: 11px; padding: 10px; border-radius: 5px; border: 1px solid #eeecec;" class="mt-5">Quota Recruitment: {{$check_num->num_of_recruitment}}</p>
                            @endif
                        @endforeach
                    @endforeach --}}
                </div>
            </div>   
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show accept-alerts" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif ($message = Session::get('rejected'))
            <div class="alert alert-danger alert-dismissible fade show accept-alerts" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div> 
        <br>

        <div class="form-container rounded mt-0">
            <table>
                <tr>
                    <th style="width:40%">
                        <p>Candidate</p>
                    </th>
                    <th>
                        <p>Resume</p>
                    </th>
                    <th>
                        <p>Applied Date</p>
                    </th>
                    <th style="width:32%">
                        <p>Action</p>
                    </th>
                </tr>
                
                {{-- {{$user->id}} = user_id in pivot table as it used appliedJob()--}}
                {{-- {{$job->id}} = lecturer_post_job_id in pivot table as it used many_job() --}}

                @foreach ($list_applicant->appliedJobs as $user)
                    @foreach ($applicant_profile as $applicant)
                        @if ($user->id == $applicant->user_id && $user->pivot->status=='2')
                        <tr>
                            <td>
                                <p style="font-size: 14px; font-weight: bold">{{$applicant->full_name}}</p>
                                @if ($applicant->college == 'CES')
                                    <p>College of Energy Economics and Social Sciences (CES)</p>
                                    @elseif ($applicant->college == 'CCI')
                                        <p>College of Computing and Informatics (CCI)</p>
                                    @elseif ($applicant->college == 'COE')
                                        <p>College of Engineering (COE)</p>
                                    @elseif ($applicant->college  == 'COBA')
                                        <p>College of Business Management and Accounting (COBA)</p>
                                    @else
                                    <p>College of Graduate Studies (COGS)</p>
                                @endif
                            </td>
                            <td>
                                <i class="fa" aria-hidden="true">
                                    <a href="lecturer-download-resume/{{$user->id}}">
                                        <img class="nav-icons" src="/assets/icons-export-pdf-100.png" alt="" style="width: 40px; height: 40px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Click to download student's resume.">
                                    </a>
                                </i>
                            </td>
                            <td>
                                <p>{{$user->pivot->created_at->format('d-M-Y')}}</p>
                            </td>
                            <td>
                                <div class="d-flex flex-row bd-highlight bd-highlight ">
                                    <div class="text-start me-3">
                                        <a href="view-student-profile/{{$user->id}}" class="btn btn-primary" style="font-size: 12px">View Profile</a>
                                    </div>  
                                    <div class="text-start me-3">
                                        <a href="lecturer-accept-job-application/{{$user->id}}" class="btn btn-success" style="font-size: 12px">Accept</a>
                                    </div> 
                                    <div class="text-start">
                                        <a href="lecturer-reject-job-application/{{$user->id}}" class="btn btn-danger" style="font-size: 12px">Reject</a>
                                    </div>    
                                </div>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    
                @endforeach
                </table> 
                {{-- @foreach ($list_applicant->appliedJobs as $user) --}}
                {{-- <div class="text-start mt-5">
                    <a href="lecturer-quota-recruitment-completed/{{$list_applicant->pivot->lecturer_post_job_id}}" class="btn btn-primary " style="font-size: 12px; margin-left: 79.5em; width: 70px">Done</a>
                    <p class="text-end mt-2">If you have met the quota for a job recruiting, click this button.</p>
                </div> --}}
                {{-- @endforeach --}}
                
        </div>
        
    </div>
<body>