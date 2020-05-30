@extends('dashboard.layout')
@section('content')
    <script src="https://kit.fontawesome.com/ffe1193991.js" crossorigin="anonymous"></script>
    <div class="p-4 ml-3">
    <div class="row">
        <div class="col-md-8 mt-2">
            <h2>Here are all the direct accessable apps</h2>
        </div>
        <div class="col-md-3 text-right mt-2 ml-5">
                <a  class="btn btn-primary float-right" href="{{url('/add-domain')}}">Add Domain</a>
        </div>
    </div>
    </div>
    <div class="p-5">
        <div class="row">
            @foreach($domains as $domainsData)
            <div class="col-3">
            <div class="card mt-4" style="width: 350px">
                @if(!empty($domainsData->image_domain))
                <img class="card-img-top" src="{{ asset('landing-page-styles/domains/' . $domainsData->image_domain) }}" alt="Card image" style="width: 350px;height: 300px;object-fit: cover;">
                @else
                    <img class="card-img-top" src="{{asset('landing-page-styles/images/undraw_secure_login_pdn4.svg')}}" alt="Card image" style="width: 350px;height: 300px;object-fit: cover;">
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{$domainsData->domain_name}}</h4>
                    <p class="card-text">Click on the card or link below to directly access gyro</p>
                    <a href="#" class="btn btn-primary">{{$domainsData->domain_name}}</a>
                    <a href="{{URL::to('')}}/edit/domain/{{$domainsData->id}}" class="float-right ml-4" style="font-size: 20px"><i class="far fa-edit"></i></a>
                    <a href="#" class="float-right" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        function setCompanyName() {
           let name = document.getElementById('name').value;
           document.getElementById('url').value = name;
        }

        function createKit() {
            let name = document.getElementById('name').value;
            let url = document.getElementById('url').value;
            if(name === ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Name!',
                });
                return;
            }
            if(url === ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Url!',
                });
                return;
            }
            document.getElementById('create-kit-btn').setAttribute('disabled', true);
            $.ajax({
                url: `{{env('APP_URL')}}/kit/create`,
                type: 'POST',
                dataType: "JSON",
                data: {name: name, url: url, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    document.getElementById('create-kit-btn').setAttribute('disabled', false);
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
                error: function(data)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

        function deleteKit(id) {
            if(!confirm('Are you sure to delete the kit?')){
                return;
            }
            $.ajax({
                url: `{{env('APP_URL')}}/kit/delete`,
                type: 'POST',
                dataType: "JSON",
                data: {id: id, "_token": "{{ csrf_token() }}"},
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
                error: function(data)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

        function addLogo(id) {
            document.getElementById('file-' + id).click();
        }

        function savelogo(id) {
            let files = document.getElementById('file-' + id).files;
            if(files.length <= 0){
                return
            }
            let formData = new FormData();
            for (let i=0;i<files.length;i++){
                formData.append('files[]', files[i]);
            }
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("id", id);
            console.log(document.getElementById('file-' + id).files);
            $.ajax({
                url: `{{env('APP_URL')}}/kit/logo`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
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
                error: function(data)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }
    </script>
@endsection
