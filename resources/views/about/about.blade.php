<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="stylesheet" href="css/about.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Libre+Baskerville&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
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
        @guest
            <div class="login">
                <a href="{{ route('login') }}"><img src="./img/login.png" alt=""></a>
            </div>
        @else
        @if (auth()->user()->role== 'user')
        <div class="dropdown login">
            <a href="/jobs"><img src="./img/login.png" alt=""></a>
            </div>
        @endif
        @if (auth()->user()->role== 'provider')
            <div class="dropdown login">
                <a href="/provider"><img src="./img/login.png" alt=""></a>
            </div>
        @endif
            <div class="button">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
                <button>Logout</button>
            </form>
            </div>
        @endguest
        <div class="container">
            <div class="abouttxt">
            <h1>Welcome to iNeed</h1>
            <p>
            your number one source for all Services. We're dedicated to providing you the very best of quality of services, with an emphasis on daily needed services.<br>
            Founded in 2019 by Anton, Ineed has come a long way from its beginnings in Spain.<br> 
             We hope you enjoy our products as much as we enjoy offering them to you.<br> If you have any questions or comments, please don't hesitate to <a href="/contact">contact us.</a><br>
             Sincerely,<br>
             Anton
             
            </p>
            </div>
        </div>
    </div>
    </div>

    <footer>
    <div class="footer-copyright text-center py-3" >© 2019 Copyright:
        <a href="/"> iNeed</a>
  </div>
</footer>
</body>
</html>