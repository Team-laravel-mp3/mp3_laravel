<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


use App\BaiHatMoi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getProfile(){
        $user =Auth::user();
        return view('pages.user.profile',['profile'=>$user]);
    }
    public function getEditProfile(){

        return view('pages.user.editprofile');
    }
    public function postEditProfile(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        if($request->hasFile('avatar')==true){
            $file = $request->file('avatar');
            $name_avatar = $file->getClientOriginalName();//lấy tên file ảnh
            $avatar = rand(0,9999)."_".$name_avatar;
            while (file_exists("images/images_avata".$avatar)) {
                $avatar = rand(0,9999)."_".$name_avatar;
            }
            $file->move(public_path("images/images_avata"),$avatar);
            $user->avatar = $avatar;
        }
        else{
            $user->avatar;
        }
        $user->update();
        return redirect('user/profile')->with('thongbao', 'bạn đã sửa thành công');
    }
    public function getbaihatmoi(){
            $id_auth = Auth::user()->id;
            $data = BaiHatMoi::where('iduser', $id_auth)->get();
            return view('pages.user.baihatmoi',['baihatmoi'=>$data]);
    }
    public function getEditBaihat($id){
        $baihatmoi = BaiHatMoi::find($id);
        return view('pages.user.editbaihatmoi',['baihatmoi'=>$baihatmoi]);
    }
    public function danhsachupload(){
        $baihatmoi = BaiHatMoi::all();
        return view('pages.user.danhsachupload',['baihatmoi'=>$baihatmoi]);
    }
    public function getUserUpload(){
        $baihatmoi = BaiHatMoi::all();
        return view('pages.user.upload',['baihatmoi'=>$baihatmoi]);
    }
    public function postUserUpload(Request $request)
    {
        $this->validate($request,[
            'tenbaihat'=>'required',
            'mp3'=>'required',
            'image'=>'required',
            'theloai'=>'required',
            'loibaihat'=>'required|min:10',
        ],[
            'tenbaihat.required'=>'Bạn chưa nhập tên bài hát',
            'mp3.required'=>'Bạn chưa thêm file nhạc',
            'image.required'=>'Bạn chưa thêm file ảnh',
            'theloai.required'=>'Bạn chưa nhập tên thể loại',
            'loibaihat.required'=>'Bạn chưa nhập lời bài hát',
            'loibaihat.min'=>'Lời bài hát phải nhiều hơn 10 kí tự'
        ]);
        $use_baihatmoi = Auth::user()->id;
        $baihatmoi = new baihatmoi;
        $baihatmoi->iduser =$use_baihatmoi;
        $baihatmoi->tenbaihat = $request->tenbaihat;
        $baihatmoi->loibaihat = $request->loibaihat;
        $baihatmoi->idtheloai = $request->theloai;
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_baihatmoi".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_baihatmoi"),$image);
            $baihatmoi->image = $image;
        }
        else{
            $baihatmoi->image = "";
        }
        if($request->hasFile('mp3')==true){
            $file = $request->file('mp3');
            $name_mp3= $file->getClientOriginalName();//lấy tên file ảnh
            $mp3 = rand(0,9999)."_".$name_mp3;
            while (file_exists("mp3/mp3_moi".$mp3)) {
                $mp3 = rand(0,9999)."_".$name_mp3;
            }
            $file->move(public_path("mp3/mp3_moi"),$mp3);
            $baihatmoi->file = $mp3;
        }
        else{
            $baihatmoi->file = "";
        }
        $baihatmoi->status = "1";
        $baihatmoi->save();

        return redirect('user/profile')->with('thongbao','Thêm thành công');

    }
    public function postDeleteBaiHatMoi($id){
        $baihatmoi = BaiHatMoi::find($id);
        $baihatmoi->delete();
        return redirect('user/profile/baihat')->with('thông báo','Xóa user thành công');
    }
    public function usercasi(){

    }
    public function userupload(){
        return view('pages.user.upload');
    }
}
