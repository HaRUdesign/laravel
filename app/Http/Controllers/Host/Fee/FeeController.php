<?php

namespace App\Http\Controllers\Host\Fee;

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

class FeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:host');
    }

     public function show()
    {
        return view('host.fee.fee-list');
    }

}
