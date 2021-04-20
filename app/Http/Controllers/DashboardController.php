<?php

namespace App\Http\Controllers;

use Illuminate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(Authenticate::class);
//    }

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route("dashboard");
        }

        return response()->view("index");
    }

    public function dashboard(): Response
    {
        $myEvents = $this->getUser()->createdEvents()->get();
        $participatedEvents = $this->getUser()->participatedEvents()->get();

        return response()->view('dashboard.index', [
            "myEvents" => $myEvents,
            "participatedEvents" => $participatedEvents
        ]);
    }
}
