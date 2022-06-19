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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="/css/auth.css">

    <script type="text/javascript">
        function callbackThen(response) {
            // read Promise object
            response.json().then(function(data) {
                console.log(data);
                if(data.success && data.score > 0.5) {
                    console.log('Valid recaptcha');
                } else {
                    document.getElementById('loginForm').addEventListener('submit', function(event) {
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
            <div class="bg-image">
                <br><br>
                <div class="main-title">
                    <h2>So glad you’re here!</h2>
                </div>
                <div class="container  rounded shadow bg-white mb-4 p-2" style="width:70vh">
                    <div class="col-md-12 p-3">
                        
                        <div class="ms-5">
                            <img style="width:200px; height:145px; margin-left: 60px" src="/assets/login-image.png" alt="Login Image">
                        </div>
                        <h2 class="login-text-2">Login</h2>
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <div class="col-md-12 p-3">              
                                <div class="row form-group mb-3 mt-2">                        
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-label="default input example" placeholder="Email">
            
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row ">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-label="default input example" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row mb-2">
                            <div class="col-md-12 ms-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                                @php
                                    Session::forget('error');
                                @endphp
                            </div>
                        @endif
                            
                        {{-- <div class="ms-3 g-recaptcha" data-sitekey="6Lfet_sfAAAAABAxSzib9AUPvTtV5Y7rpbAufQqA"></div>
                        <br/>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                        <div class="form-group">
                            
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                              @error('g-recaptcha-response')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                        </div> --}}
                        <div class="row mb-0">
                            <div class="col-md-8 ms-5  mb-2">
                                <button type="submit" class="btn btn-primary p-2" style="width: 100px">
                                    {{ __('Login') }}
                                </button>                
                            </div>
                        </div>
                    </form>
                    <div class="sign-up">
                        Need an account?
                        <a href="{{ route('user.register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

