<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SleepController extends Controller
{

    public function sleep(){
        // DB::select('pg_sleep(10)');
        DB::select('SELECT pg_sleep(10), * from users limit 1');
        return view("sleep",[]);
    }
}
