<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\Hankaku;
use App\Rules\Katakana;
use App\Rules\deletedatNull;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');

    }

    protected function guard()
    {
        return Auth::guard('user');
    }

/*****************新規登録画面へ*******************************/
    public function create()
    {
        return view('user.auth.create');
    }

/*****************新規フォームからセッションへ*******************************/
     public function confirm(Request $request)
     {
         $this->validator($request->all())->validate();

        $input = $request->all();
        //セッションに書き込む
        $request->session()->put("form_input", $input);

       return view("user.auth.confirm",["input" => $input]);
     }

    // バリデーション
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'user_mail'    => ['required', 'string', 'email', 'max:255',Rule::unique('users', 'user_mail')->whereNull('deleted_at')],
            'user_pass' => ['required', 'string', new Hankaku,'min:8','max:20'],
            'user_nickname'     => ['required', 'string', new Hankaku,'max:255','unique:users'],
            'user_familyname'     => ['required', 'string', 'max:255'],
            'user_firstname'     => ['required', 'string', 'max:255'],
            'user_kana_familyname'     => ['required', 'string', new Katakana,'max:255'],
            'user_kana_firstname'     => ['required', 'string', new Katakana,'max:255'],
            'user_sex'    => ['required', 'string', 'max:255'],
            'user_tel'    => ['required','regex:/^[0-9]+$/', 'max:255'],
            'user_address'    => ['required', 'string','max:255'],
            'user_birthday_year'    => ['required', 'string','max:255'],
            'user_birthday_month'    => ['required', 'string','max:255'],
            'user_birthday_day'    => ['required', 'string','max:255'],
            'user_newsletter'    => ['required', 'string','max:255'],
            'user_comment'    => ['nullable','string','max:255'],
            // 'user_icon'    => ['nullable'],
        ]);
    }

/*****************新規登録処理*******************************/

     // registerをオーバーライド
     public function store(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        //戻るボタンが押された時
        if($request->has("back")){
            return redirect()->action("User\Auth\RegisterController@create")->withInput($input);
        }
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("User\Auth\RegisterController@create");
		}
        //ここでメールを送信するなどを行う

        // event(new Registered($user = $this->register($input)));
        $this->register($input);

        // $this->guard()->login($user);
        // if ($response = $this->registered($request, $user)) {
        //     return $response;
        // }
        // return view("user.auth.complete");
        // return redirect()->intended($this->redirectPath());

        return redirect(route('user.login'));

    }

    // 登録処理
    protected function register(array $data)
    {

        // ifもし同じメールアドレスがあったら
        // deleted_atをnull

        return User::create([
            'user_mail'    => $data['user_mail'],
            'user_pass' => Hash::make($data['user_pass']),
            'user_nickname'    => $data['user_nickname'],
            'user_familyname'    => $data['user_familyname'],
            'user_firstname'    => $data['user_firstname'],
            'user_kana_familyname'    => $data['user_kana_familyname'],
            'user_kana_firstname'    => $data['user_kana_firstname'],
            'user_sex'    => $data['user_sex'],
            'user_tel'    => $data['user_tel'],
            'user_address'    => $data['user_address'],
            'user_birthday_year'    => $data['user_birthday_year'],
            'user_birthday_month'    => $data['user_birthday_month'],
            'user_birthday_day'    => $data['user_birthday_day'],
            'user_newsletter'    => $data['user_newsletter'],
            'user_comment'    => $data['user_comment'],
            // 'user_icon'    => null,
        ]);
    }


}
