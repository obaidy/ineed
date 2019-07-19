<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Libre+Baskerville&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="Top">
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
        <div class="contact-title">
            <h1>Stay in Touch</h1>

            </div>

        <div class="contact-form">
            <form id="contact-form" method="post" action="">
                <input name="name" type="text" class="form-control" placeholder="Your name" required><br>
                <input name="email" type="email" class="form-control" placeholder="Your E-mail" required><br>

                <textarea class="form-control" name="message" placeholder="Message" rows="4" required></textarea><br>

                <input class="form-control submit" type="submit" value="SEND MESSAGE">

            </form>
        
            

        </div>
        </div>
        </div>
</body>
</html>