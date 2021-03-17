<?php

namespace App\Http\Controllers\Host\Post;

use App\Http\Controllers\Controller;
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
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:host');

    }

/****************投稿リスト*****************/
    public function show()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('host.post.list',compact('posts'));
    }

/***************編集画面へ*****************/
    public function edit(Post $post)
    {
        return view("host.post.update")->with('post',$post);
    }

/***************編集へ*****************/
 public function updatePost(Post $post,Request $request)
        {
        $request->validate([
        'post_name'     => ['required', 'string', 'max:255'],
        'post_detail'     => ['required', 'string', 'max:2000'],
        'post_year'    => ['required', 'string','max:255'],
        'post_month'    => ['required', 'string','max:255'],
        'post_day'    => ['required', 'string','max:255'],
        'post_img'    => ['required','file','image','mimes:jpeg,jpg,gif,png']
        ]);

        $img = $request->file('post_img');

        if($img) {
            $now = date_format(Carbon::now(), 'YmdHis');
            $param  = Image::make($img)->resize(1080, 700);
            $save_path = storage_path('app/public/post_img/').$post->post_id.'_'.$now.'.jpg';
            $param->save($save_path);

            $url = Storage::url('public/post_img/'.$post->post_id.'_'.$now.'.jpg');
        }

        $allpost = $request->all();

        $allpost['post_img'] = $url;

        $post->fill($allpost);

        // $post->post_name = $request->post_name;
        // $post->post_detail = $request->post_detail;
        // $post->post_year = $request->post_year;
        // $post->post_month = $request->post_month;
        // $post->post_day = $request->post_day;
        // $post->post_img = $url;
        $post->save();
        return view("host.post.edit")->with('post',$post);
    }


















/****************新規投稿画面へ*****************/
    public function showRegistrationForm()
    {
        return view('host.post.register');
    }
 // //イベント登録のデータ取得
     public function getRegistration(Request $request)
    {
        $this->validator($request->all())->validate();
        $input = $request->all();
        $request->session()->put("form_input", $input);
       return view("host.post.confirm",["input" => $input]);
    }

    // バリデーション
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'host_name'     => ['required', 'string', 'max:255'],
            'host_mail'    => ['required', 'string', 'email', 'max:255', 'unique:hosts'],
            'host_pass' => ['required', 'string', new Hankaku,'min:8','max:20'],
        ]);
    }










    // public function show(Post $post)
    // {
    //     return view("post.edit")->with('post',$post);
    // }










}
