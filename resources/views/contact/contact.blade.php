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
</head>
<body>
    <div class="Top">
    
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
         <div class="login">
            <a href="{{ route('login') }}"><img src="./img/login.png" alt=""></a>
        </div>
        <div class="contact-title">
            <h1>Stay in Touch</h1>

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
        </div>
</body>
</html>