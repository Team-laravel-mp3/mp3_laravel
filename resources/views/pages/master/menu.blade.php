
<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link dropdown-toggle" href="" id="mega-one" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu mega-area" aria-labelledby="mega-one">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                    <a href="" class="dropdown-item">email me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link dropdown-toggle" href="" id="mega-two" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown 222
                    </a>
                    <div class="dropdown-menu mega-area" aria-labelledby="mega-two">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                            <a href="" class="dropdown-item">abc123</a>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
            </ul>
            <div>
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <?php
                                $url= Auth::user()->avatar;
                            ?>
                            <img src="{{ asset('images/images_avata/'.$url) }}" class="rounded-circle" alt="Cinque Terre" width="50px" height="50px">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="user">
                                <a class="dropdown-item" href="{{ route('Profile') }}">Trang cá nhân</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('UserRegister') }}" class="nav-link">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('UserLogin') }}" class="nav-link">Đăng nhập</a>
                        </li class="nav-item">

                        <li>
                            <a href="" class="nav-link">
                                <img src="" class="rounded-circle" alt="">
                                <span></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
