<?php

namespace App\Http\Controllers\Host\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Host;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOST_HOME;
    // public $redirectTo = '/host/dashboard';    // ここを変更する
    // protected $redirectTo ='/host/dashboard';


    public function __construct()
    {
        // $this->middleware('guest:host')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('host');
    }

//******************ログイン画面******************//
    public function showLoginForm()
    {
        return view('host.auth.login');
    }

//******************ログイン処理******************//
    public function authenticate(Request $request)
    {
         $request->validate([
           'host_mail' => ['required', 'string', 'email'],
           'host_pass' => ['required', 'string'],
       ]);
            dd($request);
           if($host = Host::where(['host_mail'=> $request->host_mail,])->first()){

                if(Hash::check($request->host_pass, $host->host_pass)){

                    $host->last_login_at = Carbon::now();
                    $host->save();
                    // こっち通る
                    Auth::login($host);

                    // Auth::guard("host")->loginUsingId($host->host_id);
                    // dd($host->host_id);

                    return redirect(route('host.home.index'));
                    // return redirect()->route('host.dashboard');

                }

            }
            return redirect()->action("Host\Auth\LoginController@showLoginForm")->with('mismatch', 'メールアドレスとパスワードが一致しません。');

    }

//******************ログアウト処理******************//
    public function logout(Request $request)
    {
        Auth::guard('host')->logout();

        return redirect('/');
    }
}
