@extends('layouts.app')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Apps</h2>
            </div>
            <div class="col-md-3 text-right mt-2 ml-5">
                <a  class="btn btn-primary float-right" href="{{url('/add-domain')}}">Register New App</a>
            </div>
        </div>
    </div>
    <div class="px-5">
            @foreach($domains as $domainsData)
                <div class="d-flex mt-2" style="border: 2px solid lightgrey; padding: 10px">
                    <div style="width: 200px">
                        @if(!empty($domainsData->image_domain))
                            <img class="card-img-top" src="{{ asset('landing-page-styles/domains/' . $domainsData->image_domain) }}" alt="Card image" style="width: 100px;height: 100px;object-fit: contain; text-align: center">
                        @else
                            <img class="card-img-top" src="{{asset('landing-page-styles/images/undraw_secure_login_pdn4.svg')}}" alt="Card image" style="width: 100px;height: 100px;object-fit: contain;">
                        @endif
                    </div>
                    <div style="width: 150px; padding-right: 10px;padding-left: 10px" class="mt-3">
                        <h5>{{$domainsData->name}}</h5>
                    </div>
                    <div style="width: 150px;padding-right: 10px;padding-left: 10px" class="mt-3 ml-2">
                        <a target="_blank" href="{{$domainsData->redirect}}">{{$domainsData->redirect}}</a>
                    </div>
                    <div style="width: 150px;margin-left: 100px;padding-right: 10px;padding-left: 10px" class="mt-2">
                        <p type="text" id="secret-{{$domainsData->id}}" style="display: none;">{{$domainsData->secret}}</p>
                        <button class="btn btn-primary" onclick="copyKey({{$domainsData->id}})">Copy Secret Key</button>
                    </div>
                    <div style="width: 300px;padding-right: 10px;padding-left: 10px" class="mt-3">
                        <a href="#" class="float-right" style="font-size: 20px"><button class="btn btn-sm btn-danger ml-2" onclick="document.getElementById('delete-form').submit()">Delete</button></a>
                        <a href="{{URL::to('')}}/edit/domain/{{$domainsData->id}}" class="float-right ml-4" style="font-size: 20px"><button class="btn btn-sm btn-primary">Edit</button></a>
                    </div>
                </div>
                <form method="post" action="{{url("/domain/delete")}}" id="delete-form">
                    @csrf
                    <input type="hidden" value="{{$domainsData->id}}" name="id">
                </form>
            @endforeach
    </div>
    <script>

        function copyKey(id) {
            var text = document.getElementById("secret-" + id).innerHTML;
            var elem = document.createElement("textarea");
            document.body.appendChild(elem);
            elem.value = text;
            elem.select();
            document.execCommand("copy");
            document.body.removeChild(elem);
            alert("Key Copied to clipboard")
        }
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
