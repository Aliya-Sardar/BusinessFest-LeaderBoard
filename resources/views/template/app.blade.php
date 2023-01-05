<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Fest 23</title>

    <link rel="icon" type="image/icon" sizes="32x32" href="/images/BFesticon.png">

    <!-- Bootstrap CSS -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="{{route('index')}}">
                <img src="/images/BFest.png" width="50" height="50" class="d-inline-block align-top" alt="">
                <h3 class="d-inline-block mt-3">Business Fest 23</h3>
            </a>
        </nav>
    </header>

    <!-- Main Section Section -->
    <div class="container-fluid">    
        @yield('main_content')
    </div>

    <!-- Footer Section -->
    <footer class="fixed-bottom" align='center'>
        <div class="container-fluid footer-bg">
            <small>Copyright &copy; 2022-23 - Business Fest.
                <br>
                All Rights Reserved.
                <br>
                Developed by IT Team.
            </small>
        </div>
    </footer>
</body>
</html>