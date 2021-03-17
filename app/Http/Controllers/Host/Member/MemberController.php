<?php

namespace App\Http\Controllers\Host\Member;

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


class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:host');
    }

/****************メンバーリスト一覧*****************/
    public function show(Request $request)
    {
        $sort = $request->sort;
        if(isset($sort)){
            $users = User::orderBy($sort,'asc')->simplePaginate(50);
            $param = ['users' => $users, 'sort' => $sort];
            return view('host.member.member-list',$param);

        }else{
            $users = User::orderBy('user_id','asc')->simplePaginate(50);
            $param = ['users' => $users];
            return view('host.member.member-list',$param);
        }

        if(isset($sort) && $sort === "user_birthday_year"){
            $users = User::select('user_birthday_year', 'user_birthday_month', 'user_birthday_day')
            ->sortBy('user_birthday_year', 'asc')
            ->sortBy('user_birthday_month', 'asc')
            ->sortBy("user_birthday_day", 'asc')
            ->simplePaginate(50);
            $param = ['users' => $users, 'sort' => $sort];
            return view('host.member.member-list',$param);
        }

         if(isset($sort) && $sort === "created_at"){
            $users = User::orderBy($sort,$request->oder);
            $param = ['users' => $users, 'sort' => $sort];
            return view('host.member.member-list',$param);
        }

        if(isset($sort) && $sort === "newsletter_on"){
            $users = User::simplePaginate(50);
            $sort = User::where('user_newsletter', 'yes')->first();
            $param = ['users' => $users, 'sort' => $sort];
            return view('host.member.member-list',$param);
        }
        if(isset($sort) && $sort === "newsletter_off"){
            $users = User::where('user_newsletter', 'no')->first()
            ->simplePaginate(50);
            $param = ['users' => $users, 'sort' => $sort];
            return view('host.member.member-list',$param);
        }
    }



}
