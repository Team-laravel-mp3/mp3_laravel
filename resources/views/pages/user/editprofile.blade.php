@extends('pages.user.layout')
@section('content')
<div class="articles">
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
    <?php
        $url=Auth::user()->avatar;
        $id=Auth::user()->id;
    ?>
    <div class="card">
        <div class="card-header">
                <h4><span>Chỉnh sửa thông tin</span></h4>
            </div>
        <div class="card-body">
            <form action="{{ route('EditProfile') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table ">
                    <tbody>
                        <tr>
                            <td>
                                <label>Ảnh đại diện</label>
                            </td>
                            <td colspan="2">
                                <div class="card" style="">
                                    <img id="avatar" class="thumbnail card-img-top-left" width="150px" height="150px" src="{{ asset('images/images_avata/'.$url) }}">
                                    <div class="card-text">
                                        <input style="" id="img" type="file" name="avatar" class="form-control-file hidden" onchange="changeImg(this)" value="{{ $url}}">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Tên hiển thị</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Email đăng nhập</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" class="btn btn-primary" value="Lưu">
                                <a href="{{ route('Profile') }}" class="btn btn-primary">Hủy</a>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

@endsection
<script>

		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
</script>

