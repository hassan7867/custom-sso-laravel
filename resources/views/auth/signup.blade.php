<html>
<head>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('landing-page-styles/css/style.css')}}"  rel="stylesheet"  >
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.4.1/jquery.min.js')}}"></script>
</head>
<body>
<nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-header navbar-mobile" style="background: #D3D3D3; color: white">
    <div class="navbar-container container">
        <div class="navbar-brand">
            <a class="navbar-brand-logo" href="{{url('/')}}">
                <img style="width: 100px; height: 100px" src="{{asset('landing-page-styles/images/logo.svg')}}">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarNav" >
            <ul class="navbar-nav menu-navbar-nav">

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{url('/login')}}">Login</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-2">
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{url('/signup')}}">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper" style="background: #D3D3D3; color: rgba(60,60,60,0.81)">
    <div class="header">
        <div class="container header-container">
            <div class="col-lg-6 header-img-section">
                <img src="{{asset('landing-page-styles/images/signup.svg')}}">
            </div>
            <div class="col-lg-5 offset-lg-1 header-title-section">
                <p class="header-title-text">Let's Get Started!</p>
                <div>
                    <label>Name</label>
                    <input type="text" class="form-control" id="firstname">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="learn-more-btn-section" onclick="signup()">
                    <a class="btn btn-primary" style="color: white; cursor: pointer">Signup</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function signup() {
        let firstname = document.getElementById('firstname').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if(firstname === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid First Name!',
            });
            return;
        }
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Email!',
            });
            return;
        }
        if(password === '' || password.length < 6){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Password! Must be greater than 5 characters',
            });
            return;
        }
        $.ajax({
            url: `{{env('APP_URL')}}/user/register`,
            type: 'POST',
            dataType: "JSON",
            data: {firstname : firstname, email: email, password: password, "_token": "{{ csrf_token() }}"},
            success: function (result) {
                if (result.status === true) {
                    window.location.href = `{{env('APP_URL')}}/dashboard`
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                    });
                }
            },
        });
    }
</script>
</body>
</html>
