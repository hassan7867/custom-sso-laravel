@extends('dashboard.layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="container">
    <center>    <h5 class="mt-4">Add Domain</h5></center>
        <form method="post" action="{{url("/add-domain")}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <center>
            <div class="">
                <img src="{{asset('landing-page-styles/images/upload_image.png')}}" style="width: 150px!important;" onclick="uploadImage()" class="rounded picture-src" id="photopreview" accept="image/*">
                <input type="file" name="image" id="photo" style="display: none">
            </div>
            </center>
            <div class="form-group">
                <label for="email">Domain Name:</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="pwd">Login URL</label>
                <input type="text" class="form-control" id="url" placeholder="Enter login Url" name="url">
            </div>
            <button type="submit" id="btnFetch" class="btn btn-primary spinner-border">Submit</button>
        </form>
    </div>
    <script type="text/javascript">
    function uploadImage() {
        document.getElementById("photo").click();
    }
    </script>
<script type="text/javascript">
    $(document).ready(function(){
// Prepare the preview for profile picture
        $("#photo").change(function(){
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photopreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('form').submit(function(){
        let name = document.getElementById('name').value;
        let url = document.getElementById('url').value;
        regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if(name === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Name!',
            });
            return false;
        }
        if(url === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Url!',
            });
            return false;
        }
        if (regexp.test(url) !==true) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Url!',
            });
            return false;
        }
            $("#btnFetch").html(
                `<span class="spinner-border spinner-border-sm" role="status"></span> Loading...`
            );
    });
</script>
@endsection
