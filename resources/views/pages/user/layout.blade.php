
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    {{-- <link rel="icon" href="{{ asset('MDBBootstrap/img/mdb-favicon.ico') }}" type="image/x-icon"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('MDBBootstrap/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('MDBBootstrap/css/mdb.min.css') }}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('MDBBootstrap/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>

        <div class="container-fluid">
                @include('pages.master.menu')

                <div class="container">
                    <div id="body">
                        <hr style="text-align: center;width:70%;">
                        <div class="row">
                            <div class="col-md-3">
                                <nav class="navbar  navbar-expand-lg navbar-light bg-light">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                                        <ul class="nav  navbar-nav navbar-text ">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('Profile')}}">Thông tin cá nhân</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{ route('Baihat') }}" >Bài hát của tôi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href=""  data-toggle="pill">Ca sĩ</a>
                                            </li>
                                            <li class="nav-item"  style="padding:5% 0 10% 0">
                                                <a class="nav-link @yield('activeuser4')" href="{{ route('danhsachupload') }}">Danh sách Upload</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('UserUpload') }}">Tải nhạc lên</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-9">
                                    @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    @include('pages.master.footer')
                </div>
        </div>

  <!-- jQuery -->
  <script type="text/javascript" src="{{ asset('MDBBootstrap/js/jquery.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('MDBBootstrap/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('MDBBootstrap/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('MDBBootstrap/js/mdb.min.js') }}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

  <script>
        $(function(){
            window.myFlux = new flux.slider('#slider', {
                autoplay: true,
                pagination: true,
                controls: true
            });
        });
    </script>
    <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("demo");
              var captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
              captionText.innerHTML = dots[slideIndex-1].alt;
            }
            </script>

      <script>
        $(document).on('change','.up', function(){
               var names = [];
               var length = $(this).get(0).files.length;
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    names.push($(this).get(0).files[i].name);
                }
                // $("input[name=file]").val(names);
                if(length>2){
                  var fileName = names.join(', ');
                  $(this).closest('.form-group').find('.form-control').attr("value",length+" files selected");
                }
                else{
                    $(this).closest('.form-group').find('.form-control').attr("value",names);
                }
       });
      </script>
      <script>
        $(function displayVals(){
            var inputVal = $('#old-mp3').val();
            $('.form-group').find('input#name-file-mp3').attr("value",inputVal);
            // $( "p#info1" ).html( "<b>Single:</b> " + singleValues +
            // " <b>Multiple:</b> " + multipleValues.join( ", " ) );
        });
        </script>
</body>
</html>
