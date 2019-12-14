<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class CheckLoginAdmin
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
            if($user->leve >= 2){
                return $next($request);
            }
            else{
                return redirect('home')->with('thongbao', 'Bạn không phải admin, xin vui lòng kiểm tra lại tài khoản!');
            }
        }
        else{
            return redirect('home')->with('thongbao', 'Bạn chưa đăng nhập không thể dùng chức năng này !');
        }
    }
}
