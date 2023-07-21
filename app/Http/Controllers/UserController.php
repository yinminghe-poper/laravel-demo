<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    public function redisGetUsers()
    {
        $users = Redis::lrange("users", 0, -1);
        return view('redis', ["users" => $users]);
    }
}
