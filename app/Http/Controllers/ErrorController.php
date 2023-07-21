<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ErrorController extends Controller
{

    public function errorTest()
    {
        Log::alert("Error Test");
        return view('error', []);
    }
}
