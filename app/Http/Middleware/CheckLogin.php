<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->leve = 1){
                return $next($request);
            }
            else{
                return redirect('home');
            }
        }
        else{
            return redirect('home')->with('thongbao', 'Bạn chưa đăng nhập không thể dùng chức năng này !');

        }
    }
}
