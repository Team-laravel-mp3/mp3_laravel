@extends('pages.master.layout')
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
<form action="{{ route('forget.password') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>Bạn quên mật khẩu của mình?</h4></div>
                <div class="card-text">
                    <p>Hãy gửi email cho chúng tôi để lấy lại mật khẩu của bạn</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">gửi</button>
                    </div>
                </div>

            </div>
        </div>
</form>
@endsection
