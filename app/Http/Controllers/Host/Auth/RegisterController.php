<?php

namespace App\Http\Controllers\Host\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Host;
use App\Rules\Hankaku;
use App\Rules\Katakana;
use App\Rules\deletedatNull;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOST_HOME;
    public function __construct()
    {
        $this->middleware('guest:host');
    }
    protected function guard()
    {
        return Auth::guard('host');
    }

/*****************新規登録画面へ*******************************/
    public function create()
    {
        return view('host.auth.create');
    }

/*****************新規フォームからセッションへ*******************************/
     public function confirm(Request $request)
     {
         $this->validator($request->all())->validate();

        $input = $request->all();
        //セッションに書き込む

        $request->session()->put("form_input", $input);

       return view("host.auth.confirm",["input" => $input]);
     }

    // バリデーション
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'host_name'     => ['required', 'string', 'max:255'],
            'host_mail'    => ['required', 'string', 'email', 'max:255',Rule::unique('hosts', 'host_mail')->whereNull('deleted_at')],
            'host_pass' => ['required', 'string', new Hankaku,'min:8','max:20'],
        ]);
    }

/*****************新規登録処理*******************************/

     // registerをオーバーライド
     public function store(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->pull("form_input");
        //戻るボタンが押された時

        if($request->has("back")){
            return redirect()->action("Host\Auth\RegisterController@create")->withInput($input);
        }
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("Host\Auth\RegisterController@create");
		}
        //ここでメールを送信するなどを行う

        event(new Registered($host = $this->register($input)));
        // $this->guard()->login($user);
        // if ($response = $this->registered($request, $user)) {
        //     return $response;
        // }
        return redirect(route('host.login'));

    }

    // 登録処理
    protected function register(array $data)
    {

        // ifもし同じメールアドレスがあったら
        // deleted_atをnull

        return Host::create([
            'host_name'    => $data['host_name'],
            'host_mail'    => $data['host_mail'],
            'host_pass' => Hash::make($data['host_pass']),
        ]);
    }


}
