@extends('layouts.student_main_layout')

@section('content')

<br><br><br>
    <div class="container w-50 rounded shadow bg-white">
        <div class="col-md-12 p-4 mb-3">

            <div class="col-md-12 p-4 ">
                <h1>Welcome to UniHired</h1>
                <p style="text-align: center; font-size: 13px">Tell us a bit about yourself. This information will appear on your public profile, so that the lecturers can
                get to know you better</p>
        
                <form method="POST" action="{{ route('student.personal.info') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- Profile Photo --}}
                        <form action="{{route('student.resume')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group mb-3">
                                    <label for="profile_picture" class="col col-form-label text-md-end">{{ __('Profile Photo') }}</label>
                                    <input class="form-control" type="file" id="profile_picture" name="profile_picture" wire:model="profile_picture">
                                </div>
                                @error('profile_picture') <span class="error">{{ $message }}</span> @enderror
                                <div class="form-group text-end">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-primary text-white" value="Upload File">
                                        <br>
                                    </div>
                                </div>
                        </form>
                        <div class="form-group mt-3">
                            <label for="course" required="required">{{ __('Full Name') }}</label>
                            <input type="email" name="course" class="form-control" id="course">
                        </div>
                        <div class="form-group mt-3"> 
                            <label for="course" required="required">{{ __('About Me') }}</label>
                            <textarea class="form-control" name="" id="" cols="10" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group mt-3"> 
                            <label for="course" required="required">{{ __('Gender') }}</label>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-1 form-check">
                                <input class="form-check-input" value="Male" type="radio" name="gender" id="gender">
                                <label class="form-check-label" for="gender">
                                Male
                                </label>
                            </div>
                            <div class="mt-1 form-check">
                                <input class="form-check-input" value="Female" type="radio" name="gender" id="gender" checked>
                                <label class="form-check-label" for="gender">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between col-md-12 ">
                            <div class="form-group mt-3 col-md-2"> 
                                <label for="course" required="required">{{ __('Age') }}</label>
                                <input type="email" name="course" class="form-control" id="course">
                            </div>
                            <div class="form-group mt-3 col-md-5"> 
                                <label for="course" required="required">{{ __('Date of Birth') }}</label>
                                <input id="DOB" type="date" class="form-control" name="DOB" required></div>
                            <div class="form-group mt-3 col-md-4"> 
                                <label for="course" required="required">{{ __('Phone') }}</label>
                                <input id="phone" type="tel" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="section-form mt-4">
                            Location
                        </div>
                        <hr>
                        <div class="form-group mt-3">
                            <label for="course" required="required">{{ __('Town') }}</label>
                            <input type="email" name="course" class="form-control" id="course">
                        </div>
                        <div class="form-group mt-3">
                            <label for="course" required="required">{{ __('City') }}</label>
                            <input type="email" name="course" class="form-control" id="course">
                        </div>
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <div class="form-group mt-3 col-md-5">
                                <label for="course" required="required">{{ __('ZIP/Post Code') }}</label>
                                <input type="email" name="course" class="form-control" id="course">
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="course" required="required">{{ __('State/Province') }}</label>
                                <input type="email" name="course" class="form-control" id="course">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="course" required="required">{{ __('Country') }}</label>
                            <input type="email" name="course" class="form-control" id="course">
                        </div>
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="footer"></div>
@endsection

