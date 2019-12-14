<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Carbon\Carbon;
//check
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

//mail
use Illuminate\Support\Facades\Mail;

//fb
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

use function GuzzleHttp\Promise\all;

class LogInController extends Controller
{
    var $email;
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required',
        ], [
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa Nhập mật khẩu',
        ]);

        $data = [
        'email' => $request->email,
        'password' => $request->password,
         ];
        if (Auth::attempt($data)) {
                return redirect('home');

        } else {
            return redirect('home')->with('thongbao', 'Đăng nhập không thành công');
        }
    }
    public function getregister(){
        return view('auth.register');
    }
    public function postregister(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:5|max:32',
            'repassword'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.uniqued'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa Nhập mật khẩu',
            'password.min'=>'Password không được nhở hơn 5 kí tự',
            'password.max'=>'Password không được lớn hơn 32 kí tự',
            'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->avatar="default_avata.jpg";
        $user->leve="1";
        $user->email = $request->email;
        $this->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        Mail::send('mails.welcome', array('name'=>$request->name,'email'=>$request->email) ,function($message){
                $message->to($this->email, 'Visitor')->subject('Chào mừng thành viên mới');
	    });
        return redirect('home')->with('thongbao','Đăng kí thành công , bạn có thể tham gia cùng với chúng tôi!');

    }
    public function DeleteUser($id){
        $deleteuser = User::find($id);
        $deleteuser->delete();
        return redirect('home');
    }
    public function getOut(){
        Auth::logout();
        return redirect('home');
    }
    public function getChangePassword(){
        return view('auth.changepassword');
    }
    public function postchangePassword(Request $request){
        $this->validate($request,[
            'cor_password'=>'required',
            'new_password'=>'required|min:8|max:50'
        ],[
            'cor_password.required'=>'Bạn chưa nhập mmật khẩu cũ',
            'new_password.required'=>'Bạn chưa nhập mmật khẩu mới',
            'new_password.min'=>'mật khẩu phải có ít nhất 8 kí tự',
            'new_password.max'=>'mật khẩu nhiều nhất là 50 kí tự',
        ]);
        $user = Auth::user();
        $cor_password =$request->cor_password;
        if( ! Hash::check($cor_password, $user->password  ) )
        {
            $user->password = bcrypt($request->new_password);
        }
        else
        {
            return redirect('user/change.password')->with('thongbao','mật  khẩu cũ không đúng');
        }
        $user->update();
        return redirect('user/profile')->with('thongbao', 'bạn đã sửa thành công');

    }
    public function ForgetPassword(){
       return view('auth.forgetpassword');
    }
    public function SendForgetPassword(Request $request){
        $email = $request->email;
        $checkUser = User::Where('email',$email)->first();
        if (!$checkUser) {
            return redirect('login/forget-password')->with('thongbao', 'email không tồn tại');
        }
        $code= bcrypt(md5(time().$email));
        $checkUser->code =$code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('reset.link',['code'=> $checkUser->code,'email'=>$email]);
        $data = [
            'route' => $url
        ];
        Mail::send('mails.mailpassword', $data, function($message) use ($email){
	        $message->to($email, 'Visitor')->subject('lấy lại mật khẩu');
	    });
        return redirect()->back()->with('thongbao','link lấy lại mật khẩu đã được gửi vào email của bạn');
    }
    public function resetPassword(Request $request){
        $code = $request->code;
        $email =$request->email;
        $checkUser =User::where([
            'code'=>$code,
            'email'=>$email
        ])->first();
        if(!$checkUser){
            return redirect('/')->with('thongbao','đường dẫn không hợp lệ, vui lòng thử lại sau');
        }
        return view('auth.resetpassword');
    }
    public function postResetPassword(Request $request){
        $this->validate($request,[
            'new_password'=>'required|min:5|max:32',
            're_password'=>'required|same:new_password'
        ],[
            'new_password.required'=>'Bạn chưa Nhập mật khẩu',
            'new_password.min'=>'Password không được nhở hơn 5 kí tự',
            'new_password.max'=>'Password không được lớn hơn 32 kí tự',
            're_password.required'=>'Bạn chưa nhập lại mật khẩu',
            're_password.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
        if($request->new_password){
            $code = $request->code;
            $email =$request->email;
            $checkUser =User::where([
                'code'=>$code,
                'email'=>$email
            ])->first();
        }
        if(!$checkUser){
            return redirect('/home')->with('thongbao','đường dẫn không hợp lệ, vui lòng thử lại sau');
        }
        $checkUser->password = bcrypt($request->new_password);
        $checkUser->save();
        return redirect('login');
    }

    // đăng nhập bằng facebook bị hủy bỏ vì ko dùng được đường link http thay vào đó fb bắt dùng https.
    // public function redirect($social)
    // {
    //     return Socialite::driver($social)->redirect();
    // }

    // public function callback($social)
    // {
    //     $user = Socialite::driver($social)->user();
    //     $authUser = $this->findOrCreateUser($user);
    //     Auth::login($authUser);
    //     return redirect()->to('/home');
    // }
    // private function findOrCreateUser($user){
    //     $authUser = User::where('provider_id', $user->id)->first();
    //     if($authUser){
    //         return $authUser;
    //     }
    //     return User::create([
    //         'name' => $user->name,
    //         'password' => $user->token,
    //         'email' => $user->email,
    //         'provider_id' => $user->id,
    //         'provider' => $user->id,
    //     ]);
    // }

}

