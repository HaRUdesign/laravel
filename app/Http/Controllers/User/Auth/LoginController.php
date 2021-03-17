<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        // $this->middleware('guest:user')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }

//******************ログイン画面******************//
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

//******************ログイン処理******************//
    public function authenticate(Request $request)
    {
         $request->validate([
           'user_mail' => ['required', 'string', 'email'],
           'user_pass' => ['required', 'string'],
       ]);

            if($user = User::where(['user_mail'=> $request->user_mail,])->first()){

                if(Hash::check($request->user_pass, $user->user_pass)){

                    $user->last_login_at = Carbon::now();
                    $user->save();
                    // こっち通る
                    Auth::login($user);

                    // なぜかエラーに
                    // Auth::loginUsingId($user->user_id);

                   return redirect(route('user.home.index'));
                }

            }
            return redirect()->action("User\Auth\LoginController@showLoginForm")->with('mismatch', 'メールアドレスとパスワードが一致しません。');
    }
//******************ログアウト処理******************//
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        return redirect('/');
    }
}
