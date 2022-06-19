{{-- @extends('layouts.auth') --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="/css/auth.css">
        	
    {{-- Recaptcha --}}
    <script type="text/javascript">
        function callbackThen(response) {
            // read Promise object
            response.json().then(function(data) {
                console.log(data);
                if(data.success && data.score > 0.5) {
                    console.log('valid recaptcha');
                } else {
                    document.getElementById('registerForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        alert('reCaptcha Error. Please try again.');
                    });
                }
            });
        }
        function callbackCatch(error){
            console.error('Error:', error) 
        }
    </script>

    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',]) 
    !!}
</head>
<body>
    <div>
        <div class="logo">
            <a href="{{ route('welcome.home') }}">
                <img src="/assets/unihired-main-logo.png" alt="Logo">
            </a>  
        </div>
        <main class="py-4">
            {{-- @yield('content') --}}
                        
            <br><br>
            <div class="main-title">
                <h2>Get started with UniHired!</h2>
            </div>
            <div class="container rounded shadow bg-white mb-3 p-4" style="width:75vh">
                <h2 class="login-text-2">Create an account</h2>
                <div class="row justify-content-center">
                    <div class="col-md-12 p-4 ">
                        
                        <form method="POST" action="{{ route('user.register') }}" id="registerForm">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                
                                <div class="col-md-12">
                                    <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Last Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>

                            {{-- <div>
                                {{ __('I am a:') }}
                            </div> --}}
                            
                            <div class="row mb-2">
                                <label for="role" class="login-text-2 mt-2 mb-3" style="font-weight: bold; font-size: 14px">{{ __('I am a:') }}</label>
                                <div class="col-md-12" >
                                    <select id="role" name="role" class="form-select" style="font-size: 14px">
                                        {{-- <option value="0">Select your role:</option> --}}
                                        <option value="1">Lecturer</option>
                                        <option value="2">Student</option>
                                    </select>
                                </div>     
                            </div>
                            
                            <input type="hidden" name="token_generate" id="token_generate">

                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <button type="submit" class="btn btn-primary p-2" name="register" style="width: 100px;margin-left: 160px;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="sign-up mt-3">
                            Already have an account? 
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> 
</body>
</html>




{{--     @isset($_POST['submit'])
        {{dd($_POST)}};
    @endisset --}}


{{-- 
@section('scripts')
    <script>
        /* function onClick(e) {
        e.preventDefault(); */
        grecaptcha.ready(function() {
            grecaptcha.execute('6Ldt3BgfAAAAAD3EfTSVyl4u97c7XrM0NMlf_dJa', {action: 'submit'}).then(function(token) {
                // Add your logic to submit to your backend server here.
                var response =  document.getElementById('token_generate');
                response.value = token; 
            });
        });
        
    </script>
@endsection
 --}}