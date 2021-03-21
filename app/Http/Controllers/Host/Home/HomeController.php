<?php

namespace App\Http\Controllers\Host\Home;

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
use App\Helpers\Aggregation;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:host');
    // }


/****************ダッシュボード*****************/
    public function index()
    {
        //集計欄
        // 合計ユーザー数
        $users_total = DB::table('users')->count();

        //投稿
        $posts = Post::orderBy('created_at','desc')->take(5)->get();

        //メンバーリスト
        // 最新登録5件表示
        $users = User::orderBy('created_at','desc')->take(5)->get();

        $params = [$users_total];

        return view('host.home.dashboard',compact('users','posts','params'));
    }




    public function showMember($id)
    {

        $user = User::findOrFail($id);
        $param = ['user' => $user];
        return view('host.member',$param);
    }

     public function editMember($id)
    {

        $host = Auth::guard("host")->user();

        $user = User::findOrFail($id);
        $param = ['host' => $host,'user' => $user];
        return view("host.member-edit",$param);
    }


     public function updateMember(User $user,Request $request)
    {
        $request->validate([
            'user_nickname'     => ['required', 'string', 'max:255'],

            // 'user_mail' =>['required',Rule::unique('users')->ignore($user->id, 'user_id')],

            'user_mail' =>['required',Rule::unique('users')->where(function ($query) use($user) {
                return $query->where('user_id', '!=',$user->user_id);
            })],



            // 'user_mail' => ['required',Rule::unique('users','user_mail')->ignore($request->user_mail)],
            // 'user_pass' => ['required', 'string', 'min:8'],
            'user_familyname'     => ['required', 'string', 'max:255'],
            'user_firstname'     => ['required', 'string', 'max:255'],
            'user_kana_familyname'     => ['required', 'string', 'max:255'],
            'user_kana_firstname'     => ['required', 'string', 'max:255'],
            'user_sex'    => ['required', 'string', 'max:255'],
            'user_tel'    => ['required', 'string', 'max:255'],
            'user_address'    => ['required', 'string','max:255'],
            'user_birthday_year'    => ['required', 'string','max:255'],
            'user_birthday_month'    => ['required', 'string','max:255'],
            'user_birthday_day'    => ['required', 'string','max:255'],
            'user_newsletter'    => ['required', 'string','max:255'],
            // 'user_comment'    => ['required', 'string','max:255'],
        ]);


        // $param =[

        //     'user_nickname' => $request->user_nickname,
        //     'user_familyname' => $request->user_familyname,
        //     'user_firstname' => $request->user_firstname,
        //     'user_kana_familyname' => $request->user_kana_familyname,
        //     'user_kana_firstname' => $request->user_kana_firstname,
        //     'user_tel' => $request->user_tel,
        //     'user_mail' => $request->user_mail,

        //     'user_sex' => $request->user_sex,
        //     'user_address' => $request->user_address,
        //     'user_birthday_year' => $request->user_birthday_year,
        //     'user_birthday_month' => $request->user_birthday_month,
        //     'user_birthday_day' => $request->user_birthday_day,
        //     'user_newsletter' => $request->user_newsletter
        // ];

        $user->fill($request->all());

        $user->save();


        // DB::update('update users set
        // user_nickname = :user_nickname,
        // user_familyname = :user_familyname,
        // user_firstname = :user_firstname,
        // user_kana_familyname = :user_kana_familyname,
        // user_kana_firstname = :user_kana_firstname,
        // user_tel = :user_tel,
        // user_mail = :user_mail,

        // user_sex = :user_sex,
        // user_address = :user_address,
        // user_birthday_year = :user_birthday_year,
        // user_birthday_month = :user_birthday_month,
        // user_birthday_day = :user_birthday_day,
        // user_newsletter = :user_newsletter
        // where user_id = :user_id', $param);

        return redirect('/host/member-list');

    }

























}
