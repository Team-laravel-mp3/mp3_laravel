@extends('pages.user.layout')
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
<form action="{{ route('password') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="card">
        <div class="card-header">
             <h3>Thay đổi mật khẩu</h3>
        </div>
        <div class="card-body">
            <div class="form">
                <div class="form-group ">
                    <label for="inputName">Mật khẩu cũ</label>
                    <input type="password" name="cor_password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group ">
                    <label for="inputEmail4">Mật khẩu mới</label>
                    <input type="password" name="new_password" class="form-control"  placeholder="Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thay đổi</button>
            <a href="{{ route('Profile') }}" class="btn btn-primary">hủy</a>
        </div>
    </div>
    </form>
@endsection
