<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(Authenticate::class);
//    }

    public function index(): Illuminate\Http\RedirectResponse
    {
//        if (Auth::check()) {
            return redirect()->route("dashboard");
//        }

//        return response()->view("index");
    }

    public function dashboard(): Response
    {
//        $user = Auth::user();
//        $myEvents = $user->createdEvents()->get();

        return response()->view('dashboard.index', [
//            "myEvents" => $myEvents
        ]);
    }
}
