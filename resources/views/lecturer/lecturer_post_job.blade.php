@extends('layouts.lecturer_side_navbar')

@section('content')

<form method="POST" action="{{ route('lecturer.submit.post.job') }}">
    @csrf

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
            <div class="container-fluid">
                <div class="title-border p-3 ms-3">           
                    <i class="fa me-2" aria-hidden="true">
                        <img class="nav-icons ms-3" src="/assets/icons-briefcase-black.png" alt="">
                    </i>                
                    Post a Job             
                </div>       
            </div>
        </div> 
        <br>
        <div class="form-container rounded " >
            <div class="ms-3 p-4">
                <div class="mt-1">
                    <h5 style="font-weight: bold;"">Job Details</h5>
                </div>
                <div class="d-flex justify-content-between me-2" style="font-size: 11px">
                    <p>All information will be publicly displayed in student's job feed</p>
                    <p>(*) for mandatory</p>
                </div>
                <hr class="mt-0">
                
                <div class="row mb-3">
                    <label for="job_title" class="col-md-3 col-form-label text-md-end">{{ __('Job Title*') }}</label>
                    <div class="col-md-8">
                        <input id="job_title" name="job_title"  type="text" class="form-control"  required aria-label="default input example">
                        @error('job_title') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="job_brief" class="col-md-3 col-form-label text-md-end">{{ __('Job Brief*') }}</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="job_brief" id="job_brief" cols="10" rows="5" 
                        placeholder="You may include the brief of job requirements here..." style="font-size:12px"></textarea>
                        @error('job_brief') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div> 
                </div>
    
                <div class="row mb-3">
                    <label for="job_responsibilities" class="col-md-3 col-form-label text-md-end">{{ __('Brief of Job Responsibilities*') }}</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="job_responsibilities" id="job_responsibilities" cols="10" rows="5" 
                        placeholder="You may include the brief of job requirements here..." style="font-size:12px"></textarea>
                        @error('job_responsibilities') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div> 
                </div>
                
                <div class="row mb-3">
                    <label for="skills_name" class="col-md-3 col-form-label text-md-end">{{ __('Required Skills*') }}</label>
                    <div class="col-md-8 d-flex justify-content-start">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="skills_name" id="skills_name"  required aria-label="default input example">
                        </div>
                    </div>              
                </div>
    
                <div class="row mb-3">
                    <label for="employment_type" class="col-md-3 col-form-label text-md-end">{{ __('Employment Type*') }}</label>
                    <div class="col-md-8 mt-2 ">
                        <input class="form-check-input me-2" value="Part Time" name="employment_type" id="employment_type" type="radio">
                        <label class="form-check-label" for="gender">
                            Part Time
                        </label>
                        @error('employment_type') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="num_of_recruitment" class="col-md-3 col-form-label text-md-end">{{ __('Number of Recruitment*') }}</label>
                    <div class="col-md-1">
                        <select style="font-size: 13px" class="form-select" name="num_of_recruitment" id="num_of_recruitment" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    @error('num_of_recruitment') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                </div>
    
                <div class="row mb-3">
                    <label for="allowance" class="col-md-3 col-form-label text-md-end">{{ __('Allowance*') }}</label>
                    <div class="col-md-2 d-flex justify-content-between">
                        <p class="mt-2 me-3">{{ __('RM ') }}</p>
                        <input id="allowance" type="text" class="form-control" name="allowance" required aria-label="default input example">
                        @error('allowance') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="row mb-3">            
                    <label for="job_duration" class="col-md-3 col-form-label text-md-end">{{ __('Job Duration*') }}</label>
                    <div class="col-md-8 d-flex justify-content-start">
                        <div class="col-md-1">
                            <input id="job_duration" type="text" class="form-control" name="job_duration" required aria-label="default input example">
                            @error('job_duration') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                        </div>
        
                        <div class="ms-3 mt-2">
                            <input class="form-check-input me-2" value="Days" name="job_duration_type" id="job_duration_type" type="radio">
                            <label class="form-check-label" for="job_duration_type">
                                Days
                            </label>
        
                            <input class="form-check-input me-2 ms-2" value="Months" type="radio" name="job_duration_type" id="job_duration_type"checked>
                            <label class="form-check-label" for="job_duration_type">
                                Months
                            </label>
    
                            <input class="form-check-input me-2 ms-2" value="Year" type="radio" name="job_duration_type" id="job_duration_type"checked>
                            <label class="form-check-label" for="job_duration_type">
                                Year
                            </label>
                        </div>
                        @error('job_duration_type') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                </div>
    
                <div class="row mb-3 d-flex justify-content-start">
                    <label for="start_date" class="col-md-3 col-form-label text-md-end">{{ __('Start Date*') }}</label>
                    <div class="col-md-3">
                        <input id="start_date" type="date" class="form-control" name="start_date" required aria-label="default input example" style="font-size: 12px">
                        @error('start_date') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
    
                    <label for="end_date" class="col-md-1 col-form-label text-md-end">{{ __('End Date*') }}</label>
                    <div class="col-md-3">
                        <input id="end_date" type="date" class="form-control" name="end_date" required aria-label="default input example" style="font-size: 12px">
                        @error('end_date') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for="work_location" class="col-md-3 col-form-label text-md-end">{{ __('Work Location*') }}</label>
                    <div class="col-md-8 d-flex justify-content-start">
                        <div class="mt-2">
                            <input class="form-check-input me-2" value="UNITEN" name="work_location" id="work_location" type="radio">
                            <label class="form-check-label" for="work_location">
                                UNITEN
                            </label>
                        </div>
                        @error('work_location') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="full_name" class="col-md-3 col-form-label text-md-end">{{ __('Required Language*') }}</label>
                    <div class="col-md-8 d-flex justify-content-start"> 
                        <div class="col-md-5">
                            <input id="language_name" type="text" class="form-control" name="language_name" wire:model="language_name" required aria-label="default input example" placeholder="Language">
                        </div>
                        <div class="col-md-4 ms-3">
                            <select name="language_level" wire:model.prevent="language_level" id="language_level" style="font-size: 12px" class="form-select option" aria-label="Default select example"  >
                                <option value="Basic">Basic</option>
                                <option value="Conversational">Conversational</option>
                                <option value="Fluent">Fluent</option>
                                <option value="Native">Native</option>
                            </select>
                        </div>                   
                    </div>               
                </div>

                <div class="row mb-3">
                    <label for="title_research_project" class="col-md-3 col-form-label text-md-end">{{ __('Title of Research project*') }}</label>
                    <div class="col-md-8">
                        <input id="title_research_project" type="text" class="form-control" name="title_research_project" required aria-label="default input example">
                        @error('title_research_project') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="research_project_brief" class="col-md-3 col-form-label text-md-end">{{ __('Brief of Research Project*') }}</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="research_project_brief" id="research_project_brief" cols="10" rows="5" 
                        placeholder="You may include the brief of your research project here..." style="font-size:12px"></textarea>
                        @error('research_project_brief') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="college_dept" class="col-md-3 col-form-label text-md-end">{{ __('College Department*') }}</label>
                    <div class="col-md-8">
                        <select style="font-size: 12px" id="college_dept" name="college_dept" id="college_dept" class="form-select"  aria-label="Default select example">
                            <option value="CFDS">College of Foundation & Diploma Studies (CFDS)</option>
                            <option value="COE">College of Engineering (COE)</option>
                            <option value="CES">College of Energy Economics and Social Sciences (CES)</option>
                            <option value="COBA">College of Business Management and Accounting (COBA)</option>
                            <option value="CCI">College of Computing and Informatics (CCI)</option>
                            <option value="COGS">College of Graduate Studies (COGS)</option>
                        </select>  
                        @error('college_dept') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror                   
                    </div>
                </div>
                
                <div class=" mt-5 text-end">
                    <button style = "font-size: 12px;" type="submit" class="btn btn-primary" >Post Job</button>                      
                </div>
                
            </div>      
        </div>
        <br>
    </div>
    </div>
    </div>
</form>
@endsection