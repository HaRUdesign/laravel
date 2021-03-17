<?php

namespace App\Http\Controllers\User\Event;

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

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    /****************投稿リスト*****************/
    public function show(Post $post)
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('host.post.list',compact('posts'));
    }


}
