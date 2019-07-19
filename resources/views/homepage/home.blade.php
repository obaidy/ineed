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
    <link rel="stylesheet" href="/css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> 

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

    </div>
    <!-- End Top -->
    <!-- Description -->
    <div class="Description">
        <h1>An easier and safer way to find trusted workers for everything you need around the house.</h1>
    </div>

    <!-- Carousel review -->

<div class="review-title">
    <h3>Our users' reviews</h3>
</div>

<div id="reviews" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="persona">
                <div class="Guys">
                    <img src="img/Avatars/Girl1.jfif" alt="">
                    <h1>Erika</h1>
                </div>
                <p class="d-block w-100">On INeed I found a great personal trainer who comes to my house on my schedule and makes my life that much simpler.</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="persona">
                <div class="Guys">
                    <img src="img/Avatars/girl2.jfif" alt="">
                    <h1>Zuzana</h1>
                </div>
                <p class="d-block w-100">By using INeed, I can find great babysitters that fit my busy lifestyle, and I know my precious boy is safe.</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="persona">
                <div class="Guys">
                    <img src="img/Avatars/Guy.jfif" alt="">
                    <h1>Pepa</h1>
                </div>
                <p class="d-block w-100">INeed makes maintaining your house a cinch. Instead of spending all weekend cleaning and working in my garden, I can find capable people of helping me.</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="persona">
                <div class="Guys">
                    <img src="img/Avatars/guy2.jfif" alt="">
                    <h1>Radek</h1>
                </div>
                <p class="d-block w-100">I've been wanting to get back in shape for years, but I never had time to hit the gym. INeed has connected me with dozens of personal trainers who can work on my schedule.</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="persona">
                <div class="Guys">
                    <img src="img/Avatars/Mark.jfif" alt="">
                    <h1>Mark</h1>
                </div>
                <p class="d-block w-100">This website's pretty cool.</p>
            </div>
        </div>
    </div>
</div>

<!-- Register -->


<div class="registerTitle">
    <h3>Create an account</h3>
</div>


<div class="register">
    @if (Route::has('register'))
        <a href="{{ route('register', ['role' => 'provider']) }}">
            <div class="option">
                <h4>Service Provider</h4>
                <img src="img/options/service.png" alt="Service Provider Image">
                <p>Do the job for someone.</p>
            </div>
        </a>
    @endif
    @if (Route::has('register'))
        <a href="{{ route('register', ['role' => 'user']) }}">
            <div class="option">
                <h4>User</h4>
                <img src="img/options/user.png" alt="User Image">
                <p>Hire someone to do the job.</p>
            
            </div>
        </a>
    @endif
</div>


<!-- Footer -->

<footer>
    <div class="footer-copyright text-center py-3" >© 2019 Copyright:
        <a href="/"> iNeed</a>
  </div>
</footer>
    

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>