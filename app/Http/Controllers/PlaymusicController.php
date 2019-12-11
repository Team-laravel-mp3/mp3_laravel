<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiHatMoi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Event;

class PlaymusicController extends Controller
{
    public function show($id)
    {   $view = 'baihatmoi_'.$id;
        if(!Session::has( $view)){
            BaiHatMoi::where('id', $id)->increment('view');
            Session::put($view, 1);
        }

        else{
           Session::forget($view);
        }
        $view_mp3 = BaiHatMoi::find($id);

        $id_auth = Auth::user()->id;
        $data = BaiHatMoi::findOrFail($id);
        $song = BaiHatMoi::where('iduser', $id_auth)->paginate(4);
        return view('pages.user.playmusic')->with(
            [
            'baihatmoi' => $data,
            'tatcabaihat'=>$song,
            'view_mp3'=>$view_mp3,
             ])->withPost($data);
    }
}
