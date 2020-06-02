<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin-login.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin-login.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
</head>
<body>
<div class="body"></div>
<div class="grad"></div>
<div class="header">
    <div>SSO Admin</div>
</div>
<br>
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <div class="login">
        <input type="text" placeholder="email" name="email" id="email"><br>
        <input type="password" placeholder="password" name="password" id="password"><br>
        <input type="submit" value="Login">
    </div>
</form>
</body>
</html>

<script>
    $("#login-button").click(function(event){
        event.preventDefault();

        $('form').fadeOut(500);
        $('.wrapper').addClass('form-success');
    });
</script>


