<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>I need</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS and Fonts -->
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> 

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body> 
    <!-- Start Top -->
    <div class="Top">
        <!-- Logo -->
        <div class="logo">
                
                <a href="/"><img src="./img/logo.png" alt=""></a>
        </div>
        <!-- Navbar -->
        <div id="menu-nav">
            <div id="navigation-bar">
                <ul>
                    <li><a href="/"><i class="fa fa-home"></i><span>Home</span></a></li>
                    <li><a href="/categ"><i class="fa fa-handshake"></i><span>Categories</span></a></li>
                    <li><a href="/about"><i class="fa fa-user"></i><span>About</span></a></li>
                    <li><a href="/contact"><i class="fa fa-book"></i><span>Contact</span></a></li>
                </ul>
            </div>
        </div>
        <!-- Log in -->
        @guest
            <div class="login">
                <a href="{{ route('login') }}"><img src="./img/login.png" alt=""></a>
            </div>
        @else
        
            <div class="dropdown login">
                <a href="/provider"><img src="./img/login.png" alt=""></a>
            
        </div>
        <div class='button'>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
                <button>Logout</button>
            </form>
        </div>
        @endguest
    </div>
    <!-- End Top -->
<main>
    @yield('content')
</main>
    <!-- Footer -->

<footer>
        <div class="footer-copyright sticky-footer text-center py-3" >© 2019 Copyright:
            <a href="/"> iNeed</a>
      </div>
    </footer>
        
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>