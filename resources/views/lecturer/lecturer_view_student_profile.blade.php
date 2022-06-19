<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/lecturer_view_student_profile.css">
    
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
                <p style="font-size: 16px; margin-left: 43px" class="mt-4 mb-2">Student's Profile</p>
            </div>   
        </div> 
        <br>
        <div class="d-flex" style="margin-left: 350px; font-size: 12px">
            <div class="align-self-start mb-5" style="width: 22em" id="example">
                <div>
                    <div class="d-flex justify-content-center mb-4">
                        <img src="/assets/img_avatar.png" alt="Avatar" style="width:150px; border-radius: 50%;">
                    </div>
                    
                    <p class="d-flex justify-content-center mb-4" style="font-weight: bold; font-size: 18px">{{$profile_details->full_name}}</p>
                    
                    <hr>
                    <p class="head-details" style="font-size: 12px">Address</p>
                    <p>{{$profile_details->city}}, {{$profile_details->state}}, {{$profile_details->country}}</p>
    
                    <hr>
                    <p class="head-details" style="font-size: 12px">Academic</p>
                    <p>{{$profile_details->course_name}}</p>
                    <p>Year {{$profile_details->year_studies}}, Sem {{$profile_details->year_studies}} {{$profile_details->year_semester}}</p>
                    @if ($profile_details->college == 'CES')
                        <p>College of Energy Economics and Social Sciences (CES)</p>
                        @elseif ($profile_details->college == 'CCI')
                            <p>College of Computing and Informatics (CCI)</p>
                        @elseif ($profile_details->college == 'COE')
                            <p>College of Engineering (COE)</p>
                        @elseif ($profile_details->college == 'COBA')
                            <p>College of Business Management and Accounting (COBA)</p>
                        @else
                        <p>College of Graduate Studies (COGS)</p>
                    @endif
                </div>
                <div>
                    <hr>
                    <h6 class="head-details" style="font-size: 12px">Email</h6>
                    <p>{{$profile->email}}</p>
                </div>
                <div>
                    <hr>
                     
                    <h6 class="head-details" style="font-size: 12px">Others</h6>
                    <br>
                    <p style="color:#1A4977; font-weight: bold">Website</p>
                    <p>{{$profile_details->website}}</p>
                    <p style="color:#1A4977; font-weight: bold">LinkedIn</p>
                    <p>{{$profile_details->linkedin}}</p>
                    <p style="color:#1A4977; font-weight: bold">GitHub</p>
                    <p>{{$profile_details->github}}</p>
                </div>    
            </div>  
            <div class="align-self-start mb-5" style="width: 50em" id="example">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="myprofile-tab" data-bs-toggle="tab" data-bs-target="#myprofile" type="button" role="tab" aria-controls="myprofile" aria-selected="true" style="color: black; font-weight: bold">My Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="resume-tab" data-bs-toggle="tab" data-bs-target="#resume" type="button" role="tab" aria-controls="resume" aria-selected="false" style="color: black; font-weight: bold">Resume</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false" style="color: black; font-weight: bold">Review</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="myprofile" role="tabpanel" aria-labelledby="myprofile-tab">
                        <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">About Me</h6>
                        <div class="box-about-me" style="font-size: 11px; padding: 12px">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </div>
                        <div>
                            <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">Personal Details</h6>
                            <hr>
                            <table>
                                <tr>
                                    <td>
                                        <p class="head-details">First Name</p>
                                        <p>{{$profile->first_name}}</p>
                                    </td>
                                    <td>
                                        <p class="head-details">Last Name</p>
                                        <p>{{$profile->last_name}}</p>
                                    </td>
                                </tr>
                                <tr style="padding-left: 30px">
                                    <td>
                                        <p class="head-details">Gender</p>
                                        <p>{{$profile_details->gender}}</p>
                                    </td>
                                    <td>
                                        <p class="head-details">Date of Birth</p>
                                        <p>{{$profile_details->DOB}}</p>
                                    </td>
                                </tr>      
                            </table>  
                        </div>
                        <div>
                            <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">Educations</h6>
                            <hr>
                            @foreach ($educations as $education)
                            <div class="d-flex justify-content-between" style="font-weight: bold">
                                <p>{{$education->uni_name}}, {{$education->country_of_uni}}</p>
                                <p>{{$education->education_year}}</p>
                            </div>
                            <div>
                                <p>{{$education->major}} - {{$education->level_education}}</p>
                            </div>
    
                                
                            @endforeach
                        </div>
                            <div>
                                <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">Certificate</h6>
                                <hr>
                                @foreach ($certificates as $certificate)
                                    <div class="d-flex justify-content-between" style="font-weight: bold">
                                        <p>{{$certificate->certificate_name}}</p>
                                        <p>{{$certificate->certificate_year}}</p> 
                                    </div>
                                    <p>{{$certificate->certified_by}}</p>
                                    
                                    
                                @endforeach
                            </div>
                            <div>
                                <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">Experience</h6>
                                <hr>
                                @foreach ($experiences as $experience)
                                <div class="mt-4">
                                    <div class="d-flex justify-content-between" style="font-weight: bold">
                                        <p>{{$experience->working_experience}}</p>
                                        <p>{{$experience->working_year}}</p>
                                    </div>
                                    
                                    <div class="box-about-me" style="font-size: 11px">
                                        {{$experience->work_description}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div>
                                <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">Skills</h6>
                                <hr>
                                <table>
                                    <tr>
                                        <th >
                                            Skills
                                        </th>
                                        <th>
                                            Level
                                        </th>
                                    </tr>
                                    @foreach ($skills as $skill)
                                        <tr>
                                            <td >
                                                {{$skill->skills_name}}
                                            </td>
                                            <td>
                                                {{$skill->level}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        
                        <div>
                            <h6 style="font-weight: bold; font-size: 12px; color: #1A4977" class="mt-4">Language</h6>
                            <hr>
                            <table>
                                <tr>
                                    <th>
                                        Language 
                                    </th>
                                    <th>
                                        Language Level
                                    </th>
                                </tr>
                                @foreach ($languages as $language)
                                    <tr>
                                        <td>
                                            {{$language->language_name}}
                                        </td>
                                        <td>
                                            {{$language->language_level}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                
                    <div class="tab-pane fade" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                        
                    </div>

                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        @foreach ($review_rating as $review)
                            @foreach ($jobs as $job)
                                @foreach ($lecturers as $lecturer)
                                    @if ($review->job_id == $job->id)
                                        @if ($review->lecturer_id == $lecturer->user_id)
                                            <div class="container-fluid mt-3 me-2 ms-1" id="example" style="width: 46em; border-radius: 5px">
                                                <div class="row ">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 style="font-size: 14px; font-weight: bold">{{$job->job_title}}</h6>
                                                        <p style="font-weight: bold">Star Rating: {{$review->star_rating}}</p>
                                                    </div>
                                                    <i class="mb-3" style="font-size: 11px">"{{$review->review}}"</i>
                                                    <div style="font-size: 11px" >
                                                        <div class="d-flex justify-content-start">
                                                            <div class="d-flex flex-row bd-highlight ">
                                                                <i class="fa" aria-hidden="true">
                                                                    <img class="nav-icons" src="/assets/icons-lecturer-100.png" alt="">
                                                                </i> 
                                                                <div class="d-flex flex-column bd-highlight ms-2">
                                                                    <p class="title mb-0">Lecturer</p>
                                                                    <p>{{$lecturer->full_name}}</p>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-row bd-highlight ms-4">
                                                                <i class="fa" aria-hidden="true">
                                                                    <img class="nav-icons" src="/assets/icons-clock-100.png" alt="">
                                                                </i> 
                                                                <div class="d-flex flex-column bd-highlight ms-2">
                                                                    <p class="title mb-0">Duration</p>
                                                                    <p>{{$job->job_duration}} {{$job->job_duration_type}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row bd-highlight ms-4">
                                                                <i class="fa" aria-hidden="true">
                                                                    <img class="nav-icons" src="/assets/icons-audit-100.png" alt="">
                                                                </i> 
                                                                <div class="d-flex flex-column bd-highlight ms-2">
                                                                    <p class="title mb-0">Job Responsibilities</p>
                                                                    <p>{{$job->job_responsibilities}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-start">
                                                            <div class="d-flex flex-row bd-highlight">
                                                                <i class="fa" aria-hidden="true">
                                                                    <img class="nav-icons" src="/assets/icons-analyze-100.png" alt="">
                                                                </i> 
                                                                <div class="d-flex flex-column bd-highlight ms-2">
                                                                    <p class="title mb-0">Project Research</p>
                                                                    <p>{{$job->title_research_project}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row bd-highlight ms-4">
                                                                <i class="fa" aria-hidden="true">
                                                                    <img class="nav-icons" src="/assets/icons-development-skill-100.png" alt="">
                                                                </i> 
                                                                <div class="d-flex flex-column bd-highlight ms-2">
                                                                    <p class="title mb-0">Job Skills</p>
                                                                    <p>{{$job->skills_name}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>  {{-- end of tab content --}}
            </div>  {{-- end of box content --}}
        </div>
    </div>
    </div>
    </div>
<body>