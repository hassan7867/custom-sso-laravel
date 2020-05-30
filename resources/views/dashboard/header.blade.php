<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript"
            src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('popper/popper.min.js')}}"></script>
<body>
<nav class="navbar navbar-expand-lg navbar-light"
     style="box-shadow: 0 2px 4px -1px rgba(0,0,0,0.25);padding-top: 0.3rem!important;;padding-bottom: 0.3rem!important">
    <a class="navbar-brand ml-4" href="{{url('/dashboard')}}">SSO Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/dashboard')}}"><span class="dashboard-button text-muted" style="font-size: 14px;">Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item">
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a class="btn-global"
               style="padding-top: 1px!important;padding-bottom: 1px!important; padding-right: 12px!important;padding-left: 12px!important;font-size: medium;"
               onclick="logout()">Logout</a>
        </div>
    </div>
</nav>
<script>
    function logout() {
        $.ajax({
            url: `{{env('APP_URL')}}/logout`,
            type: 'POST',
            dataType: "JSON",
            data: {"_token": "{{ csrf_token() }}"},
            success: function (result) {
                if (result.status === true) {
                    window.location.href = `{{env('APP_URL')}}`
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'server error! Please try again.',
                    });
                }
            },
        });
    }
</script>
</nav>
</body>
</html>
