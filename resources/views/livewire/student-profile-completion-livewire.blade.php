


<div class="bg-image">
    <br><br><br> 
    <div class="container w-50 rounded shadow bg-white mb-4">

        {{-- STEP 1: PERSONAL INFO PAGE STARTS HERE --}}
        <div class="setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1"> 
            
            @if ($errors->any())
                <div class="valid-feedback">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif


            <div class="col-md-12 p-4 mb-3">
                <div class="col-md-12 p-4">
                    <h1 class="main-title" >Welcome to UniHired</h1>
                    <p style="text-align: center; font-size: 13px">Tell us a bit about yourself. This information will appear on your public profile, so that the lecturers can
                    get to know you better</p>
                    <div class="section-form ">
                        Resume
                    </div>
                    <hr style = "height: 2px;color:#000000">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" style="padding: 10px" role="alert">
                            <strong style="font-size: 11px">{{ $message }}</strong>
                            <button type="button" class="btn-close" style="padding: 13px" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-warning alert-dismissible fade show" style="padding: 10px" role="alert">
                            <strong style="font-size: 11px">{{ $message }}</strong>
                            <button type="button" class="btn-close" style="padding: 13px" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('student.resume')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}} 
                        <div class="mb-3">
                            <input class="form-control" style="font-size: 11px" type="file" id="file_name" required name="file_name">
                            <p style="font-size: 11px" class="mt-2">Max file size: 10MB</p>
                            @error('file_name') <span style="font-size: 13px; font-weight: bold" class="alert alert-danger p-0">{{ $message }}</span>@enderror
                        </div>
                        <div class=" form-group text-end">
                            <div class="col-sm-12">
                                
                                <input type="submit" class="btn btn-primary text-white" value="Upload Resume" style="font-size: 11px">
                                <br>
                            </div>
                        </div>
                    </form>
                    <div class="section-form ">
                        Personal Info
                    </div>
                    <hr style = "height: 2px;color:#000000">
                    <div class="form-group mt-3">
                        <label for="full_name" required="required">Full Name</label>
                        <input type="text" name="full_name" class="form-control " id="full_name" wire:model="full_name">
                        @error('full_name') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                    <div class="form-group mt-3"> 
                        <label for="description" required="required">About Me</label>
                        <textarea class="form-control" name="description" id="description" wire:model="description" cols="10" rows="3" 
                        placeholder="Describe a bit about yourself..."></textarea>
                        @error('description') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                    <div class="form-group mt-3"> 
                        <label for="gender" required="required">Gender</label>
                    </div>
                    <div class="col-md-12">
                        <div class="mt-1 form-check">
                            <input class="form-check-input" value="Male" wire:model="gender" type="radio" name="gender" id="gender">
                            <label class="form-check-label" for="gender">
                            Male
                            </label>
                        </div>
                        <div class="mt-1 form-check">
                            <input class="form-check-input" value="Female" type="radio" wire:model="gender" name="gender" id="gender" checked>
                            <label class="form-check-label" for="gender">
                            Female
                            </label>
                        </div>
                        @error('gender') <span class="alert alert-danger p-0" style="font-size: 13px; font-weight:bold">{{ $message }}</span>@enderror 
                    </div>
                    
                    <div class="form-group d-flex justify-content-between col-md-12 ">
                        <div class="form-group mt-3 col-md-2"> 
                            <label for="age" required="required">Age</label>
                            <input type="text" name="age" wire:model="age" class="form-control" id="age">
                            @error('age') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                        <div class="form-group mt-3 col-md-5"> 
                            <label for="DOB" required="required">Date of Birth</label>
                            <input id="DOB" type="date" class="form-control" wire:model="DOB" name="DOB" required>
                            @error('DOB') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                        <div class="form-group mt-3 col-md-4"> 
                            <label for="phone" required="required">Phone</label>
                            <input id="phone" type="tel" class="form-control" wire:model="phone" name="phone" required>
                            @error('phone') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                    </div>
                    <div class="section-form mt-4">
                        Location
                    </div>
                    <hr style = "height: 2px;color:#000000">
                    <div class="form-group mt-3">
                        <label for="town" required="required">Town</label>
                        <input type="text" name="town" class="form-control" wire:model="town" id="town">
                        @error('town') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                    <div class="form-group mt-3">
                        <label for="city" required="required">City</label>
                        <input type="text" name="city" class="form-control" wire:model="city" id="city">
                        @error('city') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                    <div class="form-group mt-2 d-flex justify-content-between">
                        <div class="form-group mt-3 col-md-5">
                            <label for="ZIP" required="required">ZIP/Post Code</label>
                            <input type="text" name="ZIP" class="form-control" wire:model="ZIP" id="ZIP">
                            @error('ZIP') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="state" required="required">State/Province</label>
                            <input type="text" name="state" class="form-control" wire:model="state" id="state">
                            @error('state') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="country" required="required">Country</label>
                        <input type="text" name="country" class="form-control" wire:model="country" id="country">
                        @error('country') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                    </div>
                    <div class="text-end mt-5">
                        <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepPersonalInfo" type="button">Continue</button>
                    </div>    
                </div>
            </div>
        </div> {{-- end of step 1 --}}    
        {{-- PERSONAL INFO PAGE ENDS HERE --}}

        {{-- STEP 2: PROFESSIONAL INFO PAGE STARTS HERE --}}
        <div class="setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
            <div class="col-md-12 p-4 ">
                <div class="col-md-12 p-4 ">
                    <h1 class="main-title">Professional Info</h1>
                    <p style="text-align: center; font-size: 13px">Let the lecturers know more information about you as a UNITEN student</p>          
                    
                    <div class="section-form ">
                        Education
                    </div>
                    <hr style = "height: 2px;color:#000000"> 
                    <div class="form-group mt-2 d-flex justify-content-between col-md-12">
                        {{-- put student id here --}}
                        <div class="form-group col-md-8">
                            <label for="college" required="required">College</label>
                            <div>
                                <select style="font-size: 12px" id="college" name="college" id="college" class="form-select" wire:model="college" aria-label="Default select example">
                                    <option value="CFDS">College of Foundation & Diploma Studies (CFDS)</option>
                                    <option value="COE">College of Engineering (COE)</option>
                                    <option value="CES">College of Energy Economics and Social Sciences (CES)</option>
                                    <option value="COBA">College of Business Management and Accounting (COBA)</option>
                                    <option value="CCI">College of Computing and Informatics (CCI)</option>
                                    <option value="COGS">College of Graduate Studies (COGS)</option>
                                </select>
                            </div>
                            @error('college') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="course_name" required="required">Course</label>
                        <input type="text" name="course_name" wire:model="course_name" class="form-control" id="course_name">
                        @error('course_name') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mt-2 d-flex justify-content-between col-md-12">
                        <div class="form-group col-md-3">
                            <label for="year_studies" required="required">Year of Studies</label>
                            <div>
                                <select style="font-size: 12px" id="year_studies" name="year_studies" id="year_studies"class="form-select" wire:model="year_studies" aria-label="Default select example">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                @error('year_studies') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="semester" required="required">Current Semester</label>
                            <div>
                                <select style="font-size: 12px" wire:model="semester" id="semester" name="semester" class="form-select" aria-label="Default select example">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                @error('semester') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="year_semester" required="required"></label>
                            <input type="text" name="year_semester" wire:model="year_semester" class="form-control" id="year_semester" placeholder="Semester Year [e.g. 2021/2022]">
                            @error('year_semester') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            <br>
                        </div>
                    </div> 

                    {{-- OTHER EDUCATION STARTS HERE --}}
                    <div class="section-form ">
                        Other Education Level
                    </div>
                    <hr style = "height: 2px;color:#000000">              
                    <div class="row col-md-12 ">
                        <div class="row col-md-12 mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Country of College/University" wire:model="country_of_uni.0" id="country_of_uni">
                                @error('country_of_uni.0') <span style="font-size: 13px; font-weight: bold" class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="College/University" wire:model="uni_name.0">
                                @error('uni_name.0') <span style="font-size: 13px; font-weight: bold" class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <div class="form-group col-md-4">
                                <select style="font-size: 12px" class="form-select option" aria-label="Default select example" wire:model="level_education.0">
                                    <option value="Foundation">Foundation</option>
                                    <option value="Bachelor">Bachelor</option>
                                    <option value="Master">Master</option>
                                    <option value="PhD">PhD</option>
                                </select>
                                @error('level_education.0') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-6"> 
                                <input type="text" class="form-control" placeholder="Major" wire:model="major.0">
                                @error('major.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="form-group col-md-2"> 
                                <input type="text" class="form-control" placeholder="Year" wire:model="education_year.0">
                                @error('education_year.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col text-start">
                            <button class="btn btn-primary text-white" wire:click.prevent="addEducation({{$n}})">Add</button>
                        </div> 
                    </div>

                    {{-- repeated other education form --}}
                    @foreach($inputsEducation as $key => $value)
                    <div class="add-input mt-3 col-md-12">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Country of College/University" wire:model="country_of_uni.{{ $value }}">
                                    @error('country_of_uni.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" wire:model="uni_name.{{ $value }}" placeholder="College/University">
                                    @error('uni_name.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <select style="font-size: 12px" class="form-select option" aria-label="Default select example" wire:model="level_education.{{ $value }}">
                                        <option value="Foundation">Foundation</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Master</option>
                                        <option value="PhD">PhD</option>
                                    </select>
                                    @error('level_education.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group col-md-6"> 
                                    <input type="text" class="form-control" placeholder="Major" wire:model="major.{{ $value }}">
                                    @error('major.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                                
                                <div class="form-group col-md-2"> 
                                    <input type="text" class="form-control" placeholder="Year" wire:model="education_year.{{ $value }}">
                                    @error('education_year.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button class="btn btn-danger btn-sm" wire:click.prevent="removeEducation({{$key}})">Remove</button>
                            </div>
                    </div>
                    
                    @endforeach
                    <br> 
                    {{-- OTHER EDUCATION SECTION ENDS HERE --}}
                   
                    {{-- SKILL SECTION STARTS HERE --}}
                    <div class="section-form ">
                        Skills
                    </div>
                    <hr style = "height: 2px;color:#000000">                      
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Skill" wire:model="skills_name.0">
                                @error('skills_name.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" wire:model="level.0" placeholder="Enter Level">
                                @error('level.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary text-white" wire:click.prevent="addSkills({{$i}})">Add</button>
                        </div>
                    </div>
                    
                    {{-- repeated skills form --}}
                    @foreach($inputsSkills as $key => $value)
                        <div class="add-input mt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Skill" wire:model="skills_name.{{ $value }}">
                                        @error('skills_name.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" wire:model="level.{{ $value }}" placeholder="Enter Level">
                                        @error('level.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-sm" wire:click.prevent="removeSkills({{$key}})">Remove</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    {{-- SKILL SECTION ENDS HERE --}}

                    {{-- CERTIFICATE SECTION STARTS HERE --}}
                    <div class="section-form ">
                        Certificate
                    </div>
                    <hr style = "height: 2px;color:#000000">                    
                    <div class="row">
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="certificate_name" placeholder="Certificate or Award" wire:model="certificate_name.0">
                                @error('certificate_name.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-4"> 
                                <input type="text" class="form-control" id="certified_by" placeholder="Certified By" wire:model="certified_by.0">
                                @error('certified_by.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>               
                            <div class="form-group col-md-2"> 
                                <input type="text" class="form-control" id="certificate_year" placeholder="Year" wire:model="certificate_year.0">
                                @error('certificate_year.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary text-white" wire:click.prevent="addCertificate({{$x}})">Add</button>
                        </div> 
                    </div>

                    {{-- repeated certificate form --}}
                    @foreach($inputsCertificate as $key => $value)
                        <div class="add-input mt-3">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Certificate or Award" wire:model="certificate_name.{{ $value }}">
                                            @error('certificate_name.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Certified By" wire:model="certified_by.{{ $value }}">
                                            @error('certified_by.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" wire:model="certificate_year.{{ $value }}" placeholder="Year">
                                            @error('certificate_year.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="removeCertificate({{$key}})">Remove</button>
                                    </div>
                                </div>
                        </div>
                    @endforeach                        
                    <br>
                    {{-- CERTIFICATE SECTION ENDS HERE --}}
                    
                    {{-- EXPERIENCE SECTION STARTS HERE --}}
                    <div class="section-form ">
                        Experience
                    </div>
                    <hr style = "height: 2px;color:#000000">                  
                    <div class="row">
                        <div class="row mb-3">
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control" id="working_experience" placeholder="Working Experience" wire:model="working_experience.0">
                                @error('working_experience.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-3"> 
                                <input type="text" class="form-control" id="working_year" placeholder="Year" wire:model="working_year.0">
                                @error('working_year.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-12"> 
                                <textarea class="form-control mt-3" name="" id="" cols="10" rows="3" placeholder="Describe a bit about your working experience..." wire:model="work_description.0"></textarea>
                                @error('work_description.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary text-white" wire:click.prevent="addWorking({{$y}})">Add</button>
                        </div>
                    </div>
                    {{-- repeated working experience form --}}
                    @foreach($inputsWorking as $key => $value)
                        <div class="add-input mt-3">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Working Experience" wire:model="working_experience.{{ $value }}">
                                            @error('working_experience.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Year" wire:model="working_year.{{ $value }}">
                                            @error('working_year.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control mt-3" name="" id="" cols="10" rows="3" placeholder="Describe a bit about your working experience..." wire:model="work_description.{{ $value }}"></textarea>
                                            @error('work_description.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="removeWorking({{$key}})">Remove</button>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <br>
                    {{-- EXPERIENCE SECTION ENDS HERE --}}

                    <div class="section-form ">
                            Personal Website
                    </div>
                    <hr style = "height: 2px;color:#000000">
                    <div class="form-group mt-2">
                        <input type="text" wire:model="website" name="website" class="form-control" id="website" required="required">
                        @error('website') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <br>
        
                    <div class="section-form ">
                        LinkedIn
                    </div>
                    <hr style = "height: 2px;color:#000000">
                    <div class="form-group mt-2">
                        <input type="text" name="linkedin" wire:model="linkedin"  class="form-control" id="linkedin" required="required">
                        @error('linkedin') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <br>
        
                    <div class="section-form ">
                        GitHub
                    </div>
                    <hr style = "height: 2px;color:#000000">
                    <div class="form-group mt-2">
                        <input type="text" name="github" wire:model="github"  class="form-control" id="github" required="required">
                        @error('github') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <br>
            
                    {{-- EXPERIENCE SECTION STARTS HERE --}}
                    <div class="section-form ">
                        Language
                    </div>
                    <hr style = "height: 2px;color:#000000"> 
                    <div class="col-md-12">                  
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Language" wire:model="language_name.0">
                                    @error('language_name.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                                
                                    <select style="font-size: 12px" class="form-select option" aria-label="Default select example" wire:model="language_level.0">
                                        <option value="Basic">Basic</option>
                                        <option value="Conversational">Conversational</option>
                                        <option value="Fluent">Fluent</option>
                                        <option value="Native">Native</option>
                                    </select>
                                    @error('language_level.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary text-white" wire:click.prevent="addLanguage({{$z}})">Add</button>
                            </div>
                        </div> 
                    </div> 
                    {{-- repeated language form --}}
                    @foreach($inputsLanguage as $key => $value)
                    <div class="add-input mt-3 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Language" wire:model="language_name.{{ $value }}">
                                    @error('language_name.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select style="font-size: 12px" class="form-select option" aria-label="Default select example" wire:model="language_level.{{ $value }}">
                                        <option value="Basic">Basic</option>
                                        <option value="Conversational">Conversational</option>
                                        <option value="Fluent">Fluent</option>
                                        <option value="Native">Native</option>
                                    </select>
                                    @error('language_level.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger btn-sm" wire:click.prevent="removeLanguage({{$key}})">Remove</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- LANGUAGE SECTION ENDS HERE --}}

                    {{-- FINAL BUTTON --}}
                    <div class="d-flex justify-content-between mt-5">
                        <button style="background-color: #ffffff !important;
                        border-color: #1A4977;color: rgb(0, 0, 0);" type="button" class="btn btn-primary" wire:click="back(1)">Back</button>
                        <button type="button" class="btn btn-primary" wire:click="secondStepProfessionalInfo">Submit</button>                      
                    </div>                               
                </div> 
            </div>
        </div> {{-- end of step 2 --}}    
        <div class="setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3"> 
            <div class="col-md-12 p-3 mb-3">
                <div class="col-md-12 p-4">
                    <h1 class="main-title" >Yeay, your profile is all set!</h1>
                    <p style="text-align: center; font-size: 13px">Now go ahead to the platform, find and apply any available job to be research assistant. You can edit your profile information anytime.</p>
                    <div >
                        <img style="height: 240px; margin-left: 160px;"  src="/assets/success-register.png" alt="">
                    </div>
                    <div style="margin-left: 260px">
                        <a class="btn btn-primary" href="{{ route('student.find_jobs') }}">Done</a>
                    </div>                 
                </div>
            </div>
        </div>{{-- end of step 3 --}} 
        
    </div> {{-- end of white container --}}
    
    <br><br>
</div> {{-- end of whole page --}}
<div class="footer"></div>