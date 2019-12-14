@extends('pages.master.layout')
@section('title','Login')
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
<div class="card">
    <div class="card-body ">
        <div class="card-title">
            <h4>Đăng nhập để sử dụng mạng xã hội của chúng tôi</h4>
        </div>
        <div class="card-text">
            <p>Xin vui lòng điền đầy đủ thông tin của bạn xuống bên dưới</p>
        </div>
        <form action="{{ route('UserLogin') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
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
                                <input type="password" name="password" class="form-control"  placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    {{-- <a href="redirect/facebook" class="btn btn-primary">Facebook Login</a> --}}
                    <a href="{{ route('forget.password') }}" class="card-link">Quên mật khẩu</a><br><br>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://insights.dice.com/wp-content/uploads/2018/04/Social-Login-Dice.jpg" alt="">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
