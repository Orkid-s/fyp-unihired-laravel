@extends('layouts.student_main_layout')

@section('content')

<br><br><br>
<div class="container w-50 rounded shadow bg-white">
        <div class="col-md-12 p-4 mb-4">
            <div class="col-md-12 p-4 ">
            <h1>Professional Info</h1>
            <p style="text-align: center; font-size: 13px">Let the lecturers know more information about you as a UNITEN student</p>
            
            <form accept-charset="UTF-8" action="https://getform.io/f/{your-form-endpoint-goes-here}" method="POST" enctype="multipart/form-data" target="_blank">
            <div class="section-form ">
                Resume
            </div>
            <hr>
            <form action="{{route('student.resume')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="mb-3">
                        <input class="form-control" type="file" id="file_name" name="file_name">
                    </div>
                    <div class="form-group text-end">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary text-white" value="Upload File">
                            <br>
                        </div>
                    </div>
            </form>
            <div class="section-form ">
                Education
            </div>
            <hr>
            <div class="form-group mt-2>
                <label for="studentID">Student ID</label>
                <input type="text" name="studentID" class="form-control w-25" id="studentID" required="required">
            </div>
            <div class="form-group mt-2">
                <label for="course" required="required">Course</label>
                <input type="email" name="course" class="form-control" id="course">
            </div>
            <div class="form-group mt-2 d-flex justify-content-between col-md-12">
                <div class="form-group col-md-3">
                    <label for="course" required="required">Year of Studies</label>
                    <div>
                        <select id="role" name="role" class="form-select" aria-label="Default select example">
                            {{-- <option value="0">Select your role:</option> --}}
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="course" required="required">Current Semester</label>
                    <div>
                        <select id="role" name="role" class="form-select" aria-label="Default select example">
                            {{-- <option value="0">Select your role:</option> --}}
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="course" required="required"></label>
                    <input type="email" name="year" class="form-control" id="year" placeholder="Semester Year">
                    <br>
                </div>
            </div>
            <div class="section-form ">
                Other Education Level
            </div>
            <hr>
            <form action="">
                <div class="row col-md-12 ">
                    <div class="row col-md-12 mb-3">
                        <div class="col">
                        <input type="text" class="form-control" placeholder="Country of College/University">
                        </div>
                        <div class="col">
                        <input type="text" class="form-control" placeholder="College/University">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-3">
                            <select id="role" name="role" class="form-select" aria-label="Default select example">
                                {{-- <option value="0">Select your role:</option> --}}
                                <option value="1">Foundation</option>
                                <option value="2">Bachelor</option>
                                <option value="3">Master</option>
                                <option value="4">PhD</option>
                            </select>
                        </div>
                        <div class="form-group col-md-7"> 
                            <input type="text" class="form-control" id="inputCity" placeholder="Major">
                        </div>
                        
                        <div class="form-group col-md-2"> 
                            <input type="text" class="form-control" id="inputZip" placeholder="Year">
                        </div>
                    </div>
                    {{-- <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Skill" wire:model="skills_name.0">
                            @error('skills_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="level.0" placeholder="Enter Level">
                            @error('level.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>--}}
                    <div class="col text-start">
                        <button class="btn btn-primary text-white" {{-- wire:click.prevent="add({{$i}})"--}}>Add</button>
                    </div> 
                </div>
            </form>
            <br>

            <div class="section-form ">
                Skills
            </div>
            <hr>
            <form action="">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Skill" wire:model="skills_name.0">
                            @error('skills_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="level.0" placeholder="Enter Level">
                            @error('level.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary text-white" {{-- wire:click.prevent="add({{$i}}) --}}">Add</button>
                    </div>
                </div>
            </form>
            <br>

            <div class="section-form ">
                Certificate
            </div>
            <hr>
            <form action="">
                <div class="row">
                    <div class="row mb-3">
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" id="inputCity" placeholder="Certificate or Award">
                        </div>
                        <div class="form-group col-md-3"> 
                            <input type="text" class="form-control" id="inputCity" placeholder="Certified From">
                        </div>
                        
                        <div class="form-group col-md-2"> 
                            <input type="text" class="form-control" id="inputZip" placeholder="Year">
                        </div>
                    </div>
                    {{-- <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Skill" wire:model="skills_name.0">
                            @error('skills_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="level.0" placeholder="Enter Level">
                            @error('level.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div> --}}
                    <div class="col-md-2">
                        <button class="btn btn-primary text-white" {{-- wire:click.prevent="add({{$i}}) --}}">Add</button>
                    </div>
                </div>
            </form>
            <br>

            <div class="section-form ">
                Experience
            </div>
            <hr>
            <form action="">
                <div class="row">
                    <div class="row mb-3">
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="inputCity" placeholder="Working Experience">
                        </div>
                        <div class="form-group col-md-3"> 
                            <input type="text" class="form-control" id="inputCity" placeholder="Year">
                        </div>
                        <div class="form-group col-md-12"> 
                            <textarea class="form-control mt-3" name="" id="" cols="10" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                    {{-- <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Skill" wire:model="skills_name.0">
                            @error('skills_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="level.0" placeholder="Enter Level">
                            @error('level.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div> --}}
                    <div class="col-md-2">
                        <button class="btn btn-primary text-white" {{-- wire:click.prevent="add({{$i}}) --}}">Add</button>
                    </div>
                </div>
            </form>
            <br>

            <div class="section-form ">
                Personal Website
            </div>
            <hr>
            <div class="form-group mt-2">
                <input type="text" name="studentID" class="form-control" id="studentID" required="required">
            </div>
            <br>

            <div class="section-form ">
                LinkedIn
            </div>
            <hr>
            <div class="form-group mt-2">
                <input type="text" name="studentID" class="form-control" id="studentID" required="required">
            </div>
            <br>

            <div class="section-form ">
                GitHub
            </div>
            <hr>
            <div class="form-group mt-2">
                <input type="text" name="studentID" class="form-control" id="studentID" required="required">
            </div>
            <br>

            <div class="section-form ">
                Language
            </div>
            <hr>
            <form action="">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Language" wire:model="skills_name.0">
                            @error('skills_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="level.0" placeholder="Enter Level">
                            @error('level.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary text-white" {{-- wire:click.prevent="add({{$i}}) --}}">Add</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-between mt-5">
                <button type="" class="btn btn-primary">Back</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div> 
    </div> 
    </div> 
</div>
<div class="footer"></div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Professional Info') }}</div>
                    <h4>Welcome {{Auth::user()->first_name}}</h4>
                    <hr>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('Hello Students! Please complete your professional info.') }}
                    </div>
    
                    {{-- Resume Section 
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <form action="{{route('student.resume')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="mb-3">
                                        <h4><label for="file_name" class="form-label">Resume</label></h4>
                                        <input class="form-control" type="file" id="file_name" name="file_name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class=" col-sm-12">
                                            <input type="submit" class="btn bg-primary text-white" value="Upload File" />
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </form>
 --}}

                     {{-- Education Section --}}
                     
@endsection 


