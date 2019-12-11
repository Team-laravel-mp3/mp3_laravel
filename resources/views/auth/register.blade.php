@extends('pages.master.layout')
@section('title','Register')
@section('content')
@if(count($errors)>0)
<div class="alert alert-primary">
    @foreach ($errors->all() as $err)
        {{ $err }}<br>
    @endforeach
</div>
@endif
@if(session('thongbao'))
    <div class="alert alert-primary">
        {{ session('thongbao') }}
    </div>
@endif
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h3>Tham gia cùng chúng tôi để tận hưởng những giây phút tuyệt vời !</h3>
        </div>
        <div class="card-text">
            <p>Điền đầy đủ thông tin bên dưới để tiến hành đăng kí</p>
        </div>
        <form action="register" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên đại diện</label>
                        <div class="input-group ">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên của bạn">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email của bạn</label>
                        <div class="input-group ">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control"  placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <div class="input-group ">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="password" name="password" class="form-control"  placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu</label>
                        <div class="input-group ">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="password" name="repassword" class="form-control"  placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng kí</button>
                </div>
                <div class="col-md-6">
                    <div class="card">
                            <img class="card-img-top"  src="https://lazi.vn/uploads/group/1557841375_avatar-doi-dep-1_015655450.jpg" alt="">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

