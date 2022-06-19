@if(!empty($success))
<div class="alert alert-success">
    {{ $success }}
</div>
@endif

<div class="bg-image">
    <br><br><br> 
    <div class="container w-50 rounded shadow bg-white mb-4">

        {{-- STEP 1: PERSONAL INFO PAGE STARTS HERE --}}
        <div class="setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">            
            <div class="col-md-12 p-4 mb-3">
                <div class="col-md-12 p-4">
                    <h1 class="main-title" >Welcome to UniHired</h1>
                    <p style="text-align: center; font-size: 13px">Tell us a bit about yourself. This information will appear on your public profile, so that potential qualified research assistant can
                    get to know you better</p>
                    {{-- <div class="form-group d-flex flex-column bd-highlight mt-3 ">
                        <label for="full_name " required="required">
                              <p class="mb-2">Profile Picture</p>
                        </label>
                        <div class="d-flex justify-content-center">
                            <img class="avatar-image " src="{{asset('storage/lecturer_profile_photo/'.$profile_details->profile_picture)}}" alt="Avatar" style="width:120px; border-radius: 50%; border: 3px solid black"> 
                        </div>
                        <form method="post" action="{{ route('lecturer.store.upload.photo') }}" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control mt-3" type="file"  id="profile_picture" required name="profile_picture">
                            <button style="font-size: 12px" type="submit" class="btn btn-primary text-end mt-3 mb-4"> Upload Photo </button>
                        </form>
                    </div> --}}
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
                    <p style="text-align: center; font-size: 13px">Let potential qualified research assistant know more information about you as a lecturer in UNITEN.</p>          
                    <div class="section-form ">
                        Education
                    </div>
                    <hr style = "height: 2px;color:#000000"> 
                    <div class="form-group mt-2 d-flex justify-content-between col-md-12">
                        <div class="form-group col-md-8">
                            <label for="college_dept" required="required">College Department</label>
                            <div>
                                <select style="font-size: 12px" id="college_dept" name="college_dept" class="form-select" wire:model="college_dept" aria-label="Default select example">
                                    <option value="COE">College of Engineering (COE)</option>
                                    <option value="CES">College of Energy Economics and Social Sciences (CES)</option>
                                    <option value="COBA">College of Business Management and Accounting (COBA)</option>
                                    <option value="CCI">College of Computing and Informatics (CCI)</option>
                                    <option value="COGS">College of Graduate Studies (COGS)</option>
                                </select>
                            </div>
                            @error('college_dept') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror 
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="position" required="required">Position</label>
                        <input type="text" name="position" wire:model="position" class="form-control" id="position">
                        @error('position') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="room_no" required="required">Room No</label>
                        <input type="text" name="room_no" wire:model="room_no" class="form-control" id="room_no">
                        @error('room_no') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="office_contact" required="required">Office Contact number</label>
                        <input type="tel" name="office_contact" wire:model="office_contact" class="form-control" id="office_contact">
                        @error('office_contact') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="ext" required="required">Ext</label>
                        <input type="text" name="office_contact" wire:model="ext" class="form-control" id="ext">
                        @error('ext') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                    </div>
                    

                    {{-- EDUCATION STARTS HERE --}}
                    <div class="section-form ">
                        Academic Qualifications
                    </div>
                    <hr style = "height: 2px;color:#000000">              
                    <div class="add-input row col-md-12 ">
                        <div class="row mb-3">
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
                            <div class="form-group col-md-8"> 
                                <input type="text" class="form-control" placeholder="Major" wire:model="major.0">
                                @error('major.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group mt-3 d-flex  col-md-12">
                                <div class="form-group col-md-6"> 
                                    <input type="text" class="form-control" placeholder="From Year" wire:model="from_year.0">
                                    @error('from_year.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group col-md-6 ms-3"> 
                                    <input type="text" class="form-control" placeholder="Until Year" wire:model="until_year.0">
                                    @error('until_year.0') <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col text-start">
                            <button class="btn btn-primary text-white" wire:click.prevent="addAcademicQualifications({{$i}})">Add</button>
                        </div> 
                    </div>

                    {{-- repeated other education form --}}
                    @foreach($inputsAcademicQualifications as $key => $value)
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
                                <div class="form-group col-md-8"> 
                                    <input type="text" class="form-control" placeholder="Major" wire:model="major.{{ $value }}">
                                    @error('major.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group mt-3 d-flex col-md-12">
                                    <div class="form-group col-md-5"> 
                                        <input type="text" class="form-control" placeholder="From Year" wire:model="from_year.{{ $value }}">
                                        @error('from_year.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-5 ms-3"> 
                                        <input type="text" class="form-control" placeholder="Until Year" wire:model="until_year.{{ $value }}">
                                        @error('until_year.'.$value) <span class="alert alert-danger p-0">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-2 mt-3">
                                <button class="btn btn-danger btn-sm" wire:click.prevent="removeAcademicQualifications({{$key}})">Remove</button>
                            </div>
                    </div>                    
                    @endforeach
                    <br> 
                    {{-- EDUCATION SECTION ENDS HERE --}}
                   
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
                    <p style="text-align: center; font-size: 13px">Now go ahead to the platform and create your first job post to find your desireable qualified candidates to be your research assistant. You can edit your profile information anytime.</p>
                    <div >
                        <img style="height: 240px; margin-left: 160px;"  src="/assets/success-register.png" alt="">
                    </div>
                    <div style="margin-left: 260px">
                        <a class="btn btn-primary" href="{{ route('lecturer.talents_feed') }}">Done</a>
                    </div>                 
                </div>
            </div>
        </div>{{-- end of step 3 --}} 
        
    </div> {{-- end of white container --}}
    
    <br><br>
</div> {{-- end of whole page --}}
<div class="footer"></div>