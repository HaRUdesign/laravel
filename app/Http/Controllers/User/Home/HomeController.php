<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Host;
use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\Rule;
use App\Rules\Hankaku;
use App\Rules\Katakana;
use App\Rules\deletedatNull;
use App\Helpers\Aggregation;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:user')->except('logout');
    }

//******************ホーム画面******************//
    public function index()
    {
        $user = Auth::user();
        return view('user.home.index',compact('user'));
    }

/******************ユーザー情報画面********************/
    public function show()
    {
        $user = auth()->user();
        return view("user.home.show",compact('user'));
    }

     public function edit()
    {
        $user = auth()->user();
        return view("user.home.edit",compact('user'));
    }

/******************ユーザー情報のURDATE********************/
     public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'user_mail' =>['required',Rule::unique('users')->ignore($user->id)],
            'user_nickname'     => ['required', 'string', new Hankaku,'max:255',Rule::unique('users')->ignore($user->id)],
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

        // $request->validate([
        //     'user_mail' =>['required',Rule::unique('users')->where(function ($query) use($user) {
        //         return $query->where('user_id', '!=',$user->id);
        //     })],

        ]);

        $user->fill($request->all());

        $user->save();

        return redirect(route('user.home.show'))->with('success','登録情報を変更しました。');
        // return redirect(route('user.home.showInfo'))->with(セッション名,セッションの値);

    }


/******************ユーザー退会処理********************/
    public function destory()
     {
        $user = Auth::user();
        return view("user.home.destory",compact('user'));
     }

     public function delete()
     {
        $user = Auth::user();
        $user->delete();
        Auth::logout();

        return view("user.home.delete");
     }


























/******************ユーザーアイコン処理********************/
public function registerIcon(Request $request)
     {
         $request->validate([
			'user_icon' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $upload_image = $request->file('user_icon');
        $path = '';
        if($upload_image) {
        //アップロードされた画像を保存する
            $path = $upload_image->storeAs('public/user_icon', Auth::id() . '.jpg');
        }
        //画像の保存に成功したらDBに記録する
        if($path){
				Auth::user()->update([
					"user_icon" => $path
				]);
			}

        // return view('user.dashboard')->with('success', '新しいプロフィールを登録しました');
        return redirect(route('user.dashboard'))->with('success', '新しいプロフィールを登録しました');
     }






}
