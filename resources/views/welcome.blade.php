<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Home</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('landing-page-styles/css/style.css')}}"  rel="stylesheet"  >
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <script>
        $("#navbarNav").on("click", "a", function () {
            $(".navbar-toggle").click();
            //or $("#nav").slideToggle();
        });
    </script>
</head>
<body>

<nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-header navbar-mobile" style="background: #0940ff">
    <div class="navbar-container container">

        <div class="navbar-brand">
            <a class="navbar-brand-logo" href="{{url('/')}}">
                <img style="width: 100px; height: 100px; color: white" src="{{asset('landing-page-styles/images/logo.svg')}}">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
            <ul class="navbar-nav menu-navbar-nav">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link learn-more-btn" href="{{url('/login')}}">Login</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-2">
                <li class="nav-item">
                    <a class="nav-link learn-more-btn" href="{{url('/signup')}}">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="top"></div>

<div class="wrapper" style="background: #0940ff; color: white">
    <div class="header">
        <div class="container header-container">
            <div class="col-lg-6 header-img-section">
                <img src="{{asset('landing-page-styles/images/header.png')}}">
            </div>
            <div class="col-lg-5 offset-lg-1 header-title-section">
                <p class="header-title-text">CREATE A PRESS KIT FOR YOUR STARTUP</p>
                <p class="header-subtitle">Your startup's story lives here.</p>
                <div class="learn-more-btn-section">
                    <a class="nav-link learn-more-btn btn-invert" href="{{url('/signup')}}">Get Started</a>
                </div>
            </div>
        </div>
    </div>


    <div id="contact"></div>

    <div class="contact-section" style="background: #0940ff; color: white">
        <div class="container contact-container">
            <div class="col-md-6 contact-title-section">
                <p class="contact-subtitle">Contact</p>
                <h2 class="contact-title" style="color: white">Questions?<br>Get in touch</h2>
                <p class="contact-text">We'll be happy to help answer any of your questions. Send us an email and we'll get back to you shortly.</p>
                <div class="learn-more-btn-section">
                    <a class="nav-link learn-more-btn btn-invert" href="mailto:info@abc.com">Send an Email</a>
                </div>
            </div>
            <div class="col-md-6 contact-header-img">
                <img src="{{asset('landing-page-styles/images/contact-header-img.png')}}">
            </div>
        </div>
    </div>

    <div class="footer-section">
        <div class="footer-section-bg-graphics">
            <img src="{{asset('landing-page-styles/images/footer-section-bg.png')}}">
        </div>

        <div class="container footer-container">
            <div class="col-lg-3 col-md-6 footer-subsection">
                <div class="footer-subsection-2-1">
                    <h3 class="footer-subsection-title">About</h3>
                    <p class="footer-subsection-text">Domain Giving company</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-subsection">
                <h3 class="footer-subsection-title">Contact Us</h3>
                <ul class="footer-subsection-list">
                    <li>123 Business Centre<br>London SW1A 1AA</li>
                    <li>0123456789</li>
                    <li><a class="__cf_email__" data-cfemail="701d11191c30">dummy@domain.com</a></li>
                </ul>
            </div>
        </div>

        <div class="container footer-credits">
            <p>&copy; 2020 <a href="#">Website</a>. All Rights Reserved.</p>
        </div>
    </div>
</div>
</body>
</html>
