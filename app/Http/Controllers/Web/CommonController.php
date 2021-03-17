<?php

namespace App\Http\Controllers\Web;

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

class CommonController extends Controller
{
    public function showIndex()
    {
        $posts = Post::Where('post_status', '開催中')->orderBy('updated_at','desc')->take(3)->get();

        return view("index",compact('posts'));
    }

    public function showPost(Post $post){

        return view("web.post",compact('post'));

    }
}
