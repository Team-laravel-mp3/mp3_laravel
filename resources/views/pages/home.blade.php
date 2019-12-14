@extends('pages.master.layout')
@section('content')
@if(count($errors)>0)
    <div class="alert alert-danger">
    @foreach ($errors->all() as $err)
    {{ $err }}<br>
    @endforeach
    </div>
@endif
@if(session('thongbao'))
    <div class="alert alert-danger">
    {{ session('thongbao') }}
    </div>
@endif
<hr style="margin-top: 2%;margin-bottom: 2%;width: 70%;">

<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"alt="First slide">
            <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Light mask</h3>
                <p>First text</p>
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"alt="Second slide">
            <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Strong mask</h3>
                <p>Secondary text</p>
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"alt="Third slide">
            <div class="mask rgba-black-slight"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Slight mask</h3>
                <p>Third text</p>
            </div>
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
    <div class="col-md-12">
        <h4>Bài hát mới</h4>
    </div>
    <!--Controls-->
    <div class="controls-top">
    <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
        class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

    <!-- Indicators -->
    <ol class="carousel-indicators">
    <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-multi" data-slide-to="1"></li>
    <li data-target="#carousel-example-multi" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <div class="carousel-inner v-2" role="listbox">
    <div class="carousel-item active">
        <div class="row">
            @foreach ($baihatmoi as $bhm)
                <div class="col-12 col-md-4">
                    <a href="{{ URL ::to('user/profile/play-music/'.$bhm->id) }}" style="color: #74b9ff">
                        <div class="card mb-2">
                            <div class="view overlay">
                                <img class="card-img-top" src="{{ asset('images/images_baihatmoi/'.$bhm->image )}}"alt="Card image cap" width="300px" height="250px" >
                                <div class="mask flex-center rgba-green-slight">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="color: #2c3e50">{{ $bhm->tenbaihat }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</div>
<script>
        $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
            var next = $(this).next();
            if (!next.length) {
              next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<4;i++) {
              next=next.next();
              if (!next.length) {
                next=$(this).siblings(':first');
              }
              next.children(':first-child').clone().appendTo($(this));
            }
          });
</script>
@endsection
