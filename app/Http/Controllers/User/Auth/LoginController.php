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
use App\Rules\Hankaku;
use App\Rules\Katakana;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

//******************ログイン画面******************//

// AuthenticatesUsersのshowLoginForm()をオーバーライド

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

//******************ログイン処理******************//


// AuthenticatesUsersのvalidateLogin()をオーバーライド

//  protected function validateLogin(Request $request)
//     {
//         $request->validate([
//             $this->username() => 'required|string',
//             'password' => 'required|string',
//         ]);
//     }


// AuthenticatesUsersのlogin()をオーバーライド：空のメソッド
     public function login(Request $request)
    {
        // ここのメソッドを書き換えた方がいいのか、新規で作った方がいいのか
        // $this->validateLogin($request);

        $request->validate([
            'user_mail' => 'required', 'string', 'email', 'max:255',
            'user_pass' => 'required', 'string', new Hankaku,'min:8','max:20',
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);
        }


        $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);

    }












        public function authenticated(Request $request)
    {
        //ここにバリデーションを書きたい

            if($user = User::where('user_mail',$request->user_mail)->first()){

                if(Hash::check($request->user_pass, $user->user_pass)){

                    $user->last_login_at = Carbon::now();
                    $user->save();
                    Auth::login($user);

                    // IDによるユーザー認証の場合
                    // Auth::loginUsingId($user->user_id);

                    return redirect()->to('home');
                }

            }
            return redirect()->action("User\Auth\LoginController@showLoginForm")->with('mismatch', 'メールアドレスとパスワードが一致しません。');
    }
//******************ログアウト処理******************//

// AuthenticatesUsersのlogout()をオーバーライド

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
