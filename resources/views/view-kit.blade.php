<head>
    <meta charset="UTF-8">

    <title>{{$kit->name ?? ''}}</title>
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
    <script>
        (function(){

            window.ldfdr = window.ldfdr || {};
            (function(d, s, ss, fs){
                fs = d.getElementsByTagName(s)[0];

                function ce(src){
                    var cs  = d.createElement(s);
                    cs.src = src;
                    setTimeout(function(){fs.parentNode.insertBefore(cs,fs)}, 1);
                }

                ce(ss);
            })(document, 'script', 'https://sc.lfeeder.com/lftracker_v1_bElvO73Ab5PaZMqj.js');
        })();
    </script>

</head>
    <div>
        <div id="kit-id" style="display: none">{{$kit->id}}</div>
        <div id="kit-url" style="display: none">{{$kit->url}}</div>
        <div id="company-id" style="display: none">{{$company->id}}</div>
        <div id="productArr" style="display: none">{{$product}}</div>
        <div id="advisoryArr" style="display: none">{{$advisory}}</div>
        <div id="assetArr" style="display: none">{{$asset}}</div>
        <div id="imageArr" style="display: none">{{$img}}</div>
        <div id="invArr" style="display: none">{{$inv}}</div>
        <div id="newsArr" style="display: none">{{$news}}</div>
        <div id="pressUrlArr" style="display: none">{{$pressUrl}}</div>
        <div id="productHuntArr" style="display: none">{{$productHunt}}</div>
        <div id="teamArr" style="display: none">{{$team}}</div>
        <div id="videoArr" style="display: none">{{$vid}}</div>
        <div id="colorsArr" style="display: none">{{$color}}</div>
        @if(!empty($company->logo))
        <div id="logo-company" onclick="openCompanyInfo()" class="px-3 mt-4">
            <img src="{{ URL::to("/public/kits/$kit->url/$company->logo")}}" style="width: 150px; height: 120px; cursor: pointer;object-fit: contain;">
        </div>
        @endif
        <div style="margin-bottom: 200px">
            <div id="header-company">
                @if(!empty($company->full_width_header))
                <div class="mt-2">
                  <img class="mt-4" src="{{ URL::to("/public/kits/$kit->url/$company->full_width_header")}}"  style="border: 2px dotted lightgray; border-radius: 5px; height: 400px; width: 100%; cursor: pointer; object-fit: cover; z-index: -1">
                </div>
                @endif
            </div>
            <div id="press-main" class="press-contact" style="z-index: 10 !important;width: 250px; margin-top: -80px; position: relative; margin-left: 30px" >
                <div class="text-center">
                    <div id="press-image">
                        @if(!empty($company->press_contact_image))
                        <img class="mt-2"  src="{{ URL::to("/public/kits/$kit->url/$company->press_contact_image")}}" style="width: 40px; height: 40px; border-radius: 50%; cursor: pointer">
                        @endif
                    </div>
                    <div class="font-weight-bold mt-2 mb-2 text-muted">Press Contact</div>
                    <div class="row">
                        <div>
                            <input value="{{$company->press_contact_name ?? ''}}" type="text"
                                   class="form-control preview-input-field" disabled>
                            <input value="{{$company->press_contact_email ?? ''}}" type="text"
                                   class="form-control mt-2 preview-input-field" disabled>
                            <input value="{{$company->press_contact_phone ?? ''}}" type="text"
                                   class="form-control mt-2 preview-input-field" disabled>
                            <div class="d-flex text-center mt-2" id="urlPreviewList">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: 300px; margin-top: -150px">
                <p style="font-size: 24px">{{$company->description ?? ''}}</p>
                {{--<textarea style="padding: 5px; background: white; border: none !important; resize: none !important;color: rgba(76, 82, 98, 0.75); font-size: 20px" class="form-control" rows="8" cols="135" id="description" onkeydown="saveCompanyInfoOnKeyDown('description')" disabled>{{$company->description ?? ''}}</textarea>--}}
            </div>
        </div>
        <div style="position : absolute" class="mt-4"></div>
        <div class="px-3">
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="product-heading">Products</h4>
            <div class="mt-4 d-flex flex-wrap" id="productList">
            </div>
            <h4 class="mt-5 text-muted"  style="padding-top: 100px" id="producthunt-heading">Product Hunt</h4>
            <div class="mt-4 d-flex flex-wrap" id="productHuntList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="video-heading">Vidoes</h4>
            <div class="mt-4" id="videosList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="team-heading">Team</h4>
            <div class="mt-4 d-flex flex-wrap" id="teamList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="investor-heading">Investors</h4>
            <div class="mt-4 d-flex flex-wrap" id="investorList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="asset-heading">Brand Assets</h4>
            <div class="mt-4 d-flex flex-wrap" id="assetList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="image-heading">Images</h4>
            <div class="mt-4 d-flex flex-wrap" id="imageList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="news-heading">News</h4>
            <div class="mt-4" id="newsList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="advisory-heading">Advisory Board</h4>
            <div class="mt-4 d-flex flex-wrap" id="advisoryList">
            </div>
            <h4 class="mt-5 text-muted" style="padding-top: 100px" id="color-heading">Colors</h4>
            <div class="mt-4 d-flex flex-wrap" id="colorsList">
            </div>
        </div>
    </div>
    <div class="modal" style="opacity: 1" id="sharemodal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Share Your Press Kit!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">
                        Get the word out.
                    </p>
                    <div>
                        <label>Kit Name</label>
                        <input type="text" class="form-control preview-input-field" id="press-kit-sharing-url">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer text-center">
                    <button class="btn-global" onclick="copy()" id="create-kit-btn">Copy Link</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let saving;
        let saved;
        $( document ).ready(function() {
            // getCompanyFiles();
            getPressLink();
            getProducts();
            getProductHunt();
            getVideos();
            getTeam();
            getInvestor();
            getAsset();
            getImages();
            getNews();
            getAdvisory();
            getColors();
        });

        function openCompanyInfo(){
            window.open(`${document.getElementById('website-id').innerHTML}`)
        }

        function getCompanyFiles() {
            let result = document.getElementById('company-files').innerHTML;
                    let logoCompany = document.getElementById('logo-company');
                    logoCompany.innerHTML = "";
                    let logoCompanyDiv = document.createElement("div");
                    let imgSrc = '';
                    if(result.logo !== '' && result.logo !== null && result.logo !== undefined){
                        imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/'+result.logo+'';
                        logoCompanyDiv.innerHTML = '<img onclick="OpenCompanyLogoSelection(\'companyLogo\')" src="'+imgSrc+'"\n' +
                            '                 style="width: 150px; height: 120px; cursor: pointer;object-fit: contain;">'
                    }else{
                        imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                        logoCompanyDiv.innerHTML = '';
                    }
                    logoCompany.appendChild(logoCompanyDiv);

                    let headerCompany = document.getElementById('header-company');
                    headerCompany.innerHTML = "";
                    let headerCompanyDiv = document.createElement("div");
                    let imgSrcHeader = '';
                    if(result.full_width_header !== '' && result.full_width_header !== null && result.full_width_header !== undefined){
                        imgSrcHeader = '{{ URL::to("/public") }}/kits/{{$kit->url}}/'+result.full_width_header+'';
                        headerCompanyDiv.innerHTML = '<div onclick="OpenCompanyLogoSelection(\'fullWidthHeader\')" class="mt-2">\n' +
                            '                <img class="mt-4" src="'+imgSrcHeader+'"\n' +
                            '                     style="border: 2px dotted lightgray; border-radius: 5px; height: 400px; width: 100%; cursor: pointer; object-fit: cover; z-index: -1">\n' +
                            '            </div>'
                    }else{
                        imgSrcHeader = '{{asset('landing-page-styles/images/default-image.svg')}}';
                        headerCompanyDiv.innerHTML = '';
                        document.getElementById('press-main').style.marginTop = "10px";
                    }
                    headerCompany.appendChild(headerCompanyDiv);


                    let pressCompanyImg = document.getElementById('press-image');
                    pressCompanyImg.innerHTML = "";
                    let pressCompanyDiv = document.createElement("div");
                    let imgSrcPress = '';
                    if(result.press_contact_image !== '' && result.press_contact_image !== null && result.press_contact_image !== undefined){
                        imgSrcPress = '{{ URL::to("/public") }}/kits/{{$kit->url}}/'+result.press_contact_image+'';
                        pressCompanyDiv.innerHTML = '<img class="mt-2"  src="'+imgSrcPress+'" style="width: 40px; height: 40px; border-radius: 50%; cursor: pointer" onclick="OpenCompanyLogoSelection(\'pressContactImage\')">'
                    }else{
                        imgSrcPress = '{{asset('landing-page-styles/images/default-image.svg')}}';
                        pressCompanyDiv.innerHTML = '<img class="mt-2" src="'+imgSrcPress+'"\n' +
                            '                         style="width: 40px; height: 40px; border-radius: 50%; cursor: pointer" onclick="OpenCompanyLogoSelection(\'pressContactImage\')">';
                    }
                    pressCompanyImg.appendChild(pressCompanyDiv);
        }

        function getProducts() {
           let result = JSON.parse(document.getElementById('productArr').innerHTML);
                    if (result.length > 0) {
                        let productList = document.getElementById('productList');
                        productList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].name === null){
                                result[i].name = '';
                            }
                            if (result[i].description === null){
                                result[i].description = '';
                            }
                            if (result[i].link === null){
                                result[i].link = '';
                            }
                            let product = document.createElement("div");
                            product.classList.add('press-contact', 'ml-3', 'mt-2');
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/products/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img class="mt-2" src="'+imgSrc+'" style="width: 214px; height: 150px; cursor: pointer; object-fit: contain;">';
                            product.setAttribute("id", "product-" + result[i].id);
                            product.innerHTML = '<div>'+img+'</div><div><input type="text" class="form-control mt-2 preview-input-field" value="' + result[i].name + '" disabled><input  value="'+ result[i].description +'" type="text"  class="form-control mt-2 preview-input-field" disabled><input  value="'+ result[i].link +'" type="text" class="form-control mt-2 preview-input-field" disabled></div>';
                            productList.appendChild(product);
                        }
                    }else{
                        document.getElementById("product-heading").style.display = "none";
                        let productList = document.getElementById('productList');
                        productList.innerHTML = "";
                    }

        }

        function getProductHunt() {
            let result = JSON.parse(document.getElementById('productHuntArr').innerHTML);
                    if (result.length > 0) {
                        let productHuntList = document.getElementById('productHuntList');
                        productHuntList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].description === null){
                                result[i].description = '';
                            }
                            let product = document.createElement("div");
                            product.classList.add('fields-background', 'ml-3', 'mt-2');
                            product.style.padding = "20px";
                            product.style.width = "100%";
                            let ph = result[i].description;
                                ph = ph.replace(/&gt;/g, '>');
                                ph = ph.replace(/&lt;/g, '<');
                            ph = ph.replace(/&quot;/g, '"');
                            ph = ph.replace(/&apos;/g, "'");
                            ph = ph.replace(/&amp;/g, '&');
                            product.innerHTML = '<div style="padding: 30px">'+ph+'</div>';
                            productHuntList.appendChild(product);
                        }
                    }else{
                        document.getElementById("producthunt-heading").style.display = "none";
                        let productHuntList = document.getElementById('productHuntList');
                        productHuntList.innerHTML = "";
                    }
        }

        function getTeam() {
            let result = JSON.parse(document.getElementById('teamArr').innerHTML);
                    if (result.length > 0) {
                        let teamList = document.getElementById('teamList');
                        teamList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].name === null){
                                result[i].name = '';
                            }
                            if (result[i].title === null){
                                result[i].title = '';
                            }
                            let team = document.createElement("div");
                            team.classList.add('press-contact', 'ml-3', 'mt-2');
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/team/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img class="mt-2" src="'+imgSrc+'" style="width: 214px; height: 150px; object-fit: contain">';
                            team.setAttribute("id", "team-" + result[i].id);
                            team.innerHTML = '<div>'+img+'</div><div class="mt-4"><input type="text" class="form-control preview-input-field" value="' + result[i].name + '" disabled><input  value="'+ result[i].title +'" type="text" class="form-control mt-2 preview-input-field"></div>';
                            teamList.appendChild(team);
                        }
                    }else{
                        let teamList = document.getElementById('teamList');
                        teamList.innerHTML = "";
                        document.getElementById("team-heading").style.display = "none";
                    }

        }

        function getAdvisory() {
            let result = JSON.parse(document.getElementById('advisoryArr').innerHTML);
                    if (result.length > 0) {
                        let advisoryList = document.getElementById('advisoryList');
                        advisoryList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].name === null){
                                result[i].name = '';
                            }
                            if (result[i].title === null){
                                result[i].title = '';
                            }
                            let advisory = document.createElement("div");
                            advisory.classList.add('press-contact', 'ml-3', 'mt-2');
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/advisory/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img class="mt-2" src="'+imgSrc+'" style="width: 214px; height: 150px; object-fit: contain">';
                            advisory.setAttribute("id", "advisory-" + result[i].id);
                            advisory.innerHTML = '<div>'+img+'</div><div class="mt-4"><input type="text" class="form-control preview-input-field" value="' + result[i].name + '" disabled><input value="'+ result[i].title +'" type="text" class="form-control mt-2 preview-input-field" disabled></div>';
                            advisoryList.appendChild(advisory);
                        }
                    }else{
                        let advisoryList = document.getElementById('advisoryList');
                        advisoryList.innerHTML = "";
                        document.getElementById("advisory-heading").style.display = "none";
                    }

        }

        function getInvestor() {
            let result = JSON.parse(document.getElementById('invArr').innerHTML);
                    if (result.length > 0) {
                        let investorList = document.getElementById('investorList');
                        investorList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].name === null){
                                result[i].name = '';
                            }
                            if (result[i].title === null){
                                result[i].title = '';
                            }
                            let investor = document.createElement("div");
                            investor.classList.add('press-contact', 'ml-3', 'mt-2');
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/investors/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img class="mt-2" src="'+imgSrc+'" style="width: 214px; height: 150px; object-fit: contain">';
                            investor.setAttribute("id", "team-" + result[i].id);
                            investor.innerHTML = '<div>'+img+'</div><div class="mt-4"><input type="text" class="form-control preview-input-field" value="' + result[i].name + '" disabled><input value="'+ result[i].title +'" type="text" class="form-control mt-2 preview-input-field" disabled></div>';
                            investorList.appendChild(investor);
                        }
                    }else{
                        let investorList = document.getElementById('investorList');
                        investorList.innerHTML = "";
                        document.getElementById("investor-heading").style.display = "none";
                    }

        }

        function getColors() {
            let result = JSON.parse(document.getElementById('colorsArr').innerHTML);
                    if (result.length > 0) {
                        let colorsList = document.getElementById('colorsList');
                        colorsList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].hex === null){
                                result[i].hex = '';
                            }
                            if (result[i].title === null){
                                result[i].title = '';
                            }
                            if (result[i].description === null){
                                result[i].description = '';
                            }
                            let mainColor = document.createElement("div");
                            mainColor.classList.add('press-contact', 'ml-3', 'mt-2');
                            let color = '';
                            if(result[i].hex !== '' && result[i].hex !== null && result[i].hex !== undefined){
                                color = result[i].hex;
                            }else{
                                color = '#edfffa';
                            }
                            let colordiv =  '<div class="mt-4"  style="width: 214px; height: 150px;background: '+color+'">';
                            mainColor.innerHTML = '<div class="mt-3">'+colordiv+'</div><div class="mt-5"><input type="text" class="form-control preview-input-field" disabled value="' + result[i].title + '"><input value="'+ result[i].description +'" type="text" class="form-control mt-2 preview-input-field" disabled><input value="'+ result[i].hex +'" type="text" class="form-control mt-2 preview-input-field" disabled></div>';
                            colorsList.appendChild(mainColor);

                        }
                    }else{
                        let colorsList = document.getElementById('colorsList');
                        colorsList.innerHTML = "";
                        document.getElementById("color-heading").style.display = "none";
                    }

        }

        function getPressLink() {
            let result = JSON.parse(document.getElementById('pressUrlArr').innerHTML);
                    if (result.length > 0) {
                        let urlPreviewList = document.getElementById('urlPreviewList');
                        urlPreviewList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].url === null){
                                result[i].url = '';
                            }
                            let urlPreviewDiv = document.createElement("a");
                            const urlP = `${result[i].url}`;
                            urlPreviewDiv.setAttribute('href', urlP);
                            urlPreviewDiv.setAttribute('target', '_blank');
                            urlPreviewDiv.innerHTML = '<svg  style="color: #3a88ec; cursor: pointer" class="ml-2 SVGInline-svg bg-blue-svg white-svg f7-svg pa1-svg flex-svg items-middle-svg br-100-svg" data-name="Link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.57 14.57" width="1em" height="1em"><path d="M12.86 10.71a.84.84 0 0 1-.25.6l-1.32 1.31a.88.88 0 0 1-.6.23.85.85 0 0 1-.61-.24l-1.84-1.85a.86.86 0 0 1-.24-.61.85.85 0 0 1 .3-.65c.29.29.54.64 1 .64a.85.85 0 0 0 .85-.85c0-.46-.35-.71-.64-1a.84.84 0 0 1 .63-.29.86.86 0 0 1 .61.25l1.86 1.86a.84.84 0 0 1 .25.6zM6.58 4.42a.88.88 0 0 1-.29.65c-.3-.29-.55-.64-1-.64a.85.85 0 0 0-.86.86c0 .45.35.7.64 1a.85.85 0 0 1-.64.27.87.87 0 0 1-.61-.24L2 4.46a.85.85 0 0 1 0-1.2L3.28 2a.86.86 0 0 1 1.21 0l1.84 1.81a.88.88 0 0 1 .25.61zm8 6.29a2.56 2.56 0 0 0-.75-1.82L12 7a2.54 2.54 0 0 0-1.82-.75 2.58 2.58 0 0 0-1.85.78l-.83-.74a2.65 2.65 0 0 0 .79-1.87 2.52 2.52 0 0 0-.75-1.81L5.71.76a2.58 2.58 0 0 0-3.64 0L.76 2A2.59 2.59 0 0 0 0 3.86a2.56 2.56 0 0 0 .75 1.82l1.86 1.86a2.58 2.58 0 0 0 1.82.75 2.63 2.63 0 0 0 1.86-.79l.78.79a2.6 2.6 0 0 0-.78 1.86A2.51 2.51 0 0 0 7 12l1.84 1.85a2.57 2.57 0 0 0 3.63 0l1.31-1.3a2.59 2.59 0 0 0 .79-1.84z" fill="currentColor"></path></svg>';
                            urlPreviewList.appendChild(urlPreviewDiv);
                        }
                    }else{
                        let urlPreviewList = document.getElementById('urlPreviewList');
                        urlPreviewList.innerHTML = "";
                    }

        }

        function getNews() {
            let result = JSON.parse(document.getElementById('newsArr').innerHTML);
                    if (result.length > 0) {
                        let newsList = document.getElementById('newsList');
                        newsList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].description === null){
                                result[i].description = '';
                            }
                            if (result[i].title === null){
                                result[i].title = '';
                            }
                            if (result[i].url === null){
                                result[i].url = '';
                            }
                            let news = document.createElement("div");
                            news.classList.add('fields-background', "mt-4");
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/news/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img class="mt-2" src="'+imgSrc+'" style="width: 200px; height: 150px;object-fit: contain;">';

                            news.innerHTML = '<div class="d-flex fields-background" style="padding: 20px;">\n' +
                                '                <div>'+img+'\n' +
                                '                    \n' +
                                '                </div>\n' +
                                '                <div class="ml-2 mt-2">\n' +
                                '                    <h2>'+result[i].title+'</h2>\n' +
                                '                    <p style="font-size: 18px"><span>'+result[i].description+'</span><a class="text-muted ml-4" href="'+result[i].url+'" target="_blank">read more...</a></p>\n' +
                                '                </div>\n' +
                                '            </div>';
                            newsList.appendChild(news);
                        }
                    }else{
                        let newsList = document.getElementById('newsList');
                        newsList.innerHTML = "";
                        document.getElementById("news-heading").style.display = "none";
                    }

        }

        function getAsset() {
            let result = JSON.parse(document.getElementById('assetArr').innerHTML);
                    if (result.length > 0) {
                        let assetList = document.getElementById('assetList');
                        assetList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].caption === null){
                                result[i].caption = '';
                            }
                            let asset = document.createElement("div");
                            asset.classList.add('press-contact', 'ml-3', 'mt-2');
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/asset/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img  class="mt-2" src="'+imgSrc+'" style="width: 214px; height: 150px;object-fit: contain">';
                            asset.setAttribute("id", "team-" + result[i].id);
                            asset.innerHTML = '<div>'+img+'</div><div class="mt-4"><input type="text" class="form-control preview-input-field" value="' + result[i].caption + '" disabled></div>';
                            assetList.appendChild(asset);
                        }
                    }else{
                        let assetList = document.getElementById('assetList');
                        assetList.innerHTML = "";
                        document.getElementById("asset-heading").style.display = "none";
                    }

        }

        function getImages() {
            let result = JSON.parse(document.getElementById('imageArr').innerHTML);
                    if (result.length > 0) {
                        let imageList = document.getElementById('imageList');
                        imageList.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].caption === null){
                                result[i].caption = '';
                            }
                            let image = document.createElement("div");
                            image.classList.add('press-contact', 'ml-3', 'mt-2');
                            let imgSrc = '';
                            if(result[i].logo !== '' && result[i].logo !== null && result[i].logo !== undefined){
                                imgSrc = '{{ URL::to("/public") }}/kits/{{$kit->url}}/images/'+result[i].logo+'';
                            }else{
                                imgSrc = '{{asset('landing-page-styles/images/default-image.svg')}}';
                            }
                            let img =  '<img class="mt-2" src="'+imgSrc+'" style="width: 214px; height: 150px;object-fit: contain">';
                            image.setAttribute("id", "team-" + result[i].id);
                            image.innerHTML = '<div>'+img+'</div><div class="mt-4"><input type="text" class="form-control preview-input-field" value="' + result[i].caption + '" disabled></div>';
                            imageList.appendChild(image);
                        }
                    }else{
                        let imageList = document.getElementById('imageList');
                        imageList.innerHTML = "";
                        document.getElementById("image-heading").style.display = "none";
                    }

        }


        function getVideos() {
            let result = JSON.parse(document.getElementById('videoArr').innerHTML);
                    if (result.length > 0) {
                        let videolist = document.getElementById('videosList');
                        videolist.innerHTML = "";
                        for (let i=0;i<result.length;i++){
                            if (result[i].url_video === null){
                                result[i].url_video = '';
                            }
                            let video = document.createElement("div");
                            video.classList.add("mt-4");
                            let defaultVideo = '{{asset('landing-page-styles/images/default-video.svg')}}';
                            video.innerHTML = '<div>\n' +
                                '                    \n' +
                                '                    <input type="text" style="display: none" value="'+result[i].url_video+'" id="videoURL-'+result[i].id+'" placeholder="enter youtube url">\n' +
                                '                </div>\n' +
                                '                <div class="mt-2">\n' +
                                '                                        \n<div id="video-placeholder-'+result[i].id+'" class="ml-5"></div>\n' +
                                '                    <div id="video-logo-'+result[i].id+'" class="ml-5">\n' +
                                '                        <img src="'+defaultVideo+'" style="width: 1000px; height: 450px">\n' +
                                '                    </div>\n' +
                                '                </div>';

                            videolist.appendChild(video);
                            setTimeout(function () {
                                onYouTubeIframeAPIReady(result[i].id);
                            },400)
                        }
                    }else{
                        let videolist = document.getElementById('videosList');
                        videolist.innerHTML = "";
                        document.getElementById("video-heading").style.display = "none";
                    }

        }

        function onYouTubeIframeAPIReady(id) {
            // saveVideoInfo(id);
            var player;
            video = document.getElementById('videoURL-' + id).value.split("v=")[1];
            if (video === undefined || video === null || video === '') {
                document.getElementById('video-logo-'+id).style.display="block";
                document.getElementById('video-placeholder-'+id).style.display="none";
                return;
            }
            document.getElementById('video-logo-'+id).style.display="none";
            document.getElementById('video-placeholder-'+id).style.display="block";
            // player = null;
            player = new YT.Player('video-placeholder-' + id, {
                width: 900,
                height: 450,
                videoId: video,
                playerVars: {
                    color: 'white',
                },
            });

        }
    </script>

