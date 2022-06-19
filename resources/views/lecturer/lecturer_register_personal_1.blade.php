@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Personal Info') }}</div>
                <h4>Welcome {{Auth::user()->first_name}} !</h4>
                <hr>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello Lecturers! Please complete your personal info.') }}

                    <form method="POST" action="{{ route('lecturer.personal.info') }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Profile Picture --}}
                        <div class="row mb-3">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                    <input type="file" class="form-control" name="profile_picture" id="profile_picture">
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Full Name --}}
                        <div class="row mb-3">
                            <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control" name="full_name" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- About Me --}}
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('About Me') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name="description"rows="6"></textarea>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div>
                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" value="Male" type="radio" name="gender" id="gender">
                                    <label class="form-check-label" for="gender">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Female" type="radio" name="gender" id="gender" checked>
                                    <label class="form-check-label" for="gender">
                                    Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Age --}}
                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control" name="age" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- DOB --}}
                        <div class="row mb-3">
                            <label for="DOB" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control" name="DOB" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection