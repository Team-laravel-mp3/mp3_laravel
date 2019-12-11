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
            <h4>Đổi mật khẩu để tiếp tục !</h4>
        </div>
        <div class="card-text">
            <p>Xin vui lòng điền đầy đủ thông tin mật khẩu bạn muốn đổi</p>
        </div>
        <div class="col-md-6 form-register">
            <form action="" method="post">
                <h3></h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <div class="input-group ">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="new_password" class="form-control"  placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu</label>
                            <div class="input-group ">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="re_password" class="form-control"  placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>
@endsection
