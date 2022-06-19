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
    

    	
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                        alert('recaptcha error');
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

    {{-- Recaptcha --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js?render=6Ldt3BgfAAAAAD3EfTSVyl4u97c7XrM0NMlf_dJa"></script>
 --}}
    
    
</head>
<body>
    <div>
        <div class="logo">
            <a href="{{ route('welcome.home') }}">
                <img src="/assets/unihired-main-logo.png" alt="Logo">
            </a>  
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
        {{-- <script src="{{asset('/js/jquery-2.1.4.js')}}"></script>
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>
        @yield('script') --}}

    
</body>
</html>

@yield('scripts')
