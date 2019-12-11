@extends('pages.user.layout')
@section('content')
<style>
    .card-header{
        background-image: url("https://live.staticflickr.com/5657/21654959191_c7ca63bb45_b.jpg")
    }
    .card .card-img-top-left {
        border: 5px solid #ecf0f1;
    }
</style>
    <div class=" card-header">
        <?php
            $url=Auth::user()->avatar;
            $id_user=Auth::user()->id;
        ?>
        <img class="card-img-top-left rounded-circle" src="{{ asset('images/images_avata/'.$url) }}" alt="Card image Cinque Terre" style="width:10%">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3><span>Giới thiệu :</span></h3>
                    <div class="card-text">
                        <p >Họ và tên : {{ Auth::user()->name}}</p>
                        <p >Giới thiệu về bản thân :</p>
                        <P>giới tính : chưa xác định</P>
                        <P>ngày sinh : chưa xác định</P>
                    </div>
                    <a href="{{ route('EditProfile') }}" class="btn btn-danger"> Sửa</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
               <div class="card-body">
                    <h3><p>Playlist</p></h3>
               </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Tài khoản</h3>
                    <div class="card-text">
                        <p>Tên tài khoản : {{ Auth::user()->email }}</p>
                        <p>Mật khẩu :<a class="link" href="{{ route('password') }}">Đổi mật khẩu</a> </p>
                        <p>Mức độ ưu tiên : <?php $leve =Auth::user()->leve; ?>
                            @if ($leve > 1)
                                <a href="{{ route('userlist') }}" ><span>Người quản lí</span></a>
                            @else
                                <span>Khách hàng</span>
                            @endif
                        </p>
                        {!! Form::open(['method' => 'POST', 'route' => ['delete.user', $id_user]]) !!}
                            {!! Form::submit('Xóa tài khoản', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3><p>Video của tôi</p></h3>
                </div>
            </div>
        </div>
    </div>
@endsection
