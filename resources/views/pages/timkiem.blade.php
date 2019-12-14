@extends('pages.master.layout')
@section('content')
@if(session('thongbao'))
    <div class="alert alert-primary">
        {{ session('thongbao') }}
    </div>
@endif
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h4><span>Tìm kiếm : {{ $tukhoa }}</span></h4>

        </div>
    </div>
    <div class="card-body">
        <table class="table  table-hover">
                @foreach ($tintuc as $tt)
                <tbody>
                        <tr >
                            <td>
                                <img src="{{ asset('images/images_baihatmoi/'.$tt->image )}} " width="50" height="50" alt="">
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ URL ::to('user/profile/play-music/'.$tt->id) }}">{{ $tt->tenbaihat }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href=""><i class="far fa-heart"></i></a>
                            </td>
                            <td>
                                <p><span><i class="fas fa-eye"></i></span>{{ $tt->view }}</p>
                            </td>
                            <td>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Thêm</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('delete_Baihatmoi',$tt->id) }}">Xóa</a>
                                            <a class="dropdown-item" href="{{ route('getedit.baihat',$tt->id) }}">sửa</a>
                                            <a class="dropdown-item" href="#">thông tin</a>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
        </table>
    </div>
</div>
@endsection


