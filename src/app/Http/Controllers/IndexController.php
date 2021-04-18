<?php

namespace App\Http\Controllers;

use Illuminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route("homepage");
        }

        return response()->view("index");
    }

    public function dashboard(): Request
    {
    }
}
