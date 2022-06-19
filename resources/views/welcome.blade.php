<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/assets/tab-icon.png">
        <link rel="stylesheet" href="/css/welcome.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/welcome.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    </head>
    <body class="bg-image">
            <div class="logo">
                <img src="assets/mainpage-logo.png" alt="Main Logo">
            </div>
            <div class="d-flex flex-row-reverse bd-highlight mt-4 me-5 ">
                @if (Route::has('login'))                
                <a href="{{ route('login') }}" class="btn btn-primary m-2 p-2 rounded">Log in</a>
                    @if (Route::has('user.register'))
                        <a href="{{ route('user.register') }}" class="btn btn-primary m-2">Register</a>
                    @endif   
                @endif                 
            </div>
                
            <div class="center-text position-absolute top-50 start-25"">
                <h2 class="center-text-h2 ">We bring freelancing services to</h2> 
                <h2 class="center-text-h2 mt-4"> the UNITEN community. </h2>
            </div>
                   
            <div class="image1">
                <img src="assets/mainpage-image-1.png" alt="Image1">
            </div>
            <div class="image2">
                <img src="assets/mainpage-image-2.png" alt="Image2">
            </div>
            <div class="image3">
                <img src="assets/mainpage-image-3.png" alt="Image3">
            </div>
            <div class="image4">
                <img src="assets/mainpage-image-4.png" alt="Image4">
            </div>
            <div class="image5">
                <img src="assets/mainpage-image-5.png" alt="Image5">
            </div>
            <div class="image6">
                <img src="assets/mainpage-image-6.png" alt="Image7">
            </div>
            <div class="image7">
                <img src="assets/mainpage-image-7.png" alt="Image7">
            </div>
            <div class="image8">
                <img src="assets/mainpage-image-8.png" alt="Image7">
            </div>
            <div class="image9">
                <img src="assets/mainpage-image-9.png" alt="Image7">
            </div>
                <br><br>
            <div class="footer-box"></div>   
    </body>
</html>
