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

class EventController extends Controller
{
     public function showEvent($id)

    {   $post = Post::findOrFail($id);
        return view("event.post",compact('post'));
    }
}
