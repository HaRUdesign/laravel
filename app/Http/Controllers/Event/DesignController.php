<?php

namespace App\Http\Controllers\Event;

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

class DesignController extends Controller
{
    public function show()
    {
        $helds = Post::where('post_category', 'デザイン')->Where('post_status', '開催中')->orderBy('updated_at','desc')->get();

        $requests = Post::where('post_category', 'デザイン')->Where('post_status', 'リクエスト')->orderBy('updated_at','desc')->get();

        $ends = Post::where('post_category', 'デザイン')->Where('post_status', '終了')->orderBy('updated_at','desc')->get();

        return view("design.design",compact('helds','requests','ends'));
    }
    public function showIndividual(Post $post)
        {
            return view("event.post",compact('post'));
        }

}
