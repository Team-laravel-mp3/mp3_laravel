<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark sticky-top default-color">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">LOVE MUSIC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <form action="{{ route('postsearch') }}" method="POST" class="form-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="md-form my-0">
                          <input type="text" class="form-control mr-sm-2" id="tukhoa" name="tukhoa" placeholder="Từ khóa" aria-label="Search" ></input>
                        </div>
                        <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit">Tìm kiếm</button>
                    </form>
                    <ul id="search-ul">

                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
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
                    <a href="" class="btn btn-info " data-toggle="modal" data-target="#modalLRForm">Đăng nhập / Đăng kí</a>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar -->

<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                    Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                    Đăng kí</a>
                </li>
            </ul>

            <!-- Tab panels -->
            <div class="tab-content">
            <!--Panel 7-->
                <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                    <form action="{{ route('UserLogin') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!--Body-->
                        <div class="modal-body mb-1">

                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-envelope prefix"></i>
                                <input type="email" name="email" id="modalLRInput10" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput10">Tài khoản</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" name="password" id="modalLRInput11" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput11">Mật khẩu</label>
                            </div>
                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-info">Đăng nhập</button>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                                <p>Bạn không có tài khoản? <a href="#" class="blue-text">Đăng kí tại đây.</a></p>
                                <p><a href="{{ route('forget.password') }}" class="blue-text">Quên mật khẩu?</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
                        </div>

                    </form>

                </div>
                <!--/.Panel 7-->

                <!--Panel 8-->
                <div class="tab-pane fade" id="panel8" role="tabpanel">

                <!--Body-->
                <form action="{{ route('UserRegister') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-pen prefix"></i>
                            <input type="text" name="name" id="modalLRInput12" class="form-control form-control-sm validate">
                            <label data-error="wrong" data-success="right" for="modalLRInput12">Tên đại diện</label>
                        </div>
                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-envelope prefix"></i>
                            <input type="email" name="email" id="modalLRInput12" class="form-control form-control-sm validate">
                            <label data-error="wrong" data-success="right" for="modalLRInput12">Tài khoản</label>
                        </div>

                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" name="password" id="modalLRInput13" class="form-control form-control-sm validate">
                            <label data-error="wrong" data-success="right" for="modalLRInput13">Mật khẩu </label>
                        </div>

                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" name="repassword" id="modalLRInput14" class="form-control form-control-sm validate">
                            <label data-error="wrong" data-success="right" for="modalLRInput14">Nhập lại mật khẩu</label>
                        </div>

                        <div class="text-center form-sm mt-2">
                            <button class="btn btn-info">Đăng kí</button>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <div class="options text-right">
                            <p class="pt-1">Bạn đã có tài khoản? <a href="#" class="blue-text">Đăng nhập</a></p>
                        </div>
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
                </div>
            <!--/.Panel 8-->
            </div>

        </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->

    {{--  //scrip search
    <script type="text/javascript">
        $('#tukhoa').on('keyup',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success:function(data){
                    $('#search-ul').html(data);
                }
            });
        })
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>  --}}

