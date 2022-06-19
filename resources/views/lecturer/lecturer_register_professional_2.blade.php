@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Professional Info') }}</div>
                <h4>Welcome {{Auth::user()->first_name}} !</h4>
                <hr>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello Lecturers! Please complete your professional info.') }}

                    <form method="POST" action="{{ route('lecturer.professional.info') }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- College Department--}}
                        <div class="row mb-3">
                            
                            <div class="row mb-3">
                                <label for="college_dept" class="col-md-4 col-form-label text-md-end">{{ __('College Department') }}</label>
                                <div class="col-md-6">
                                    <select id="college_dept" name="college_dept" class="form-select" aria-label="Default select example">
                                        {{-- <option value="0">Select your role:</option> --}}
                                        <option value="CCI">CCI</option>
                                        <option value="COE">COE</option>
                                        <option value="CES">CES</option>
                                        <option value="COBA">COBA</option>
                                        <option value="COGS">COGS</option>
                                    </select>
                                </div>     
                            </div>
                        </div>

                        {{-- Position --}}
                        <div class="row mb-3">
                            <label for="position" class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Room No--}}
                        <div class="row mb-3">
                            <label for="room_no" class="col-md-4 col-form-label text-md-end">{{ __('Room No') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="text" class="form-control" name="room_no" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Office Contact Number --}}
                        <div class="row mb-3">
                            <label for="office_contact" class="col-md-4 col-form-label text-md-end">{{ __('Office Contact') }}</label>

                            <div class="col-md-6">
                                <input id="office_contact" type="tel" class="form-control" name="office_contact" required>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Ext --}}
                        <div class="row mb-3">
                            <label for="ext" class="col-md-4 col-form-label text-md-end">{{ __('Ext') }}</label>

                            <div class="col-md-6">
                                <input id="ext" type="text" class="form-control" name="ext" required>

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
                                    {{ __('Submit') }}
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