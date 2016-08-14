<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        return view('admin.dashboard', [
            'users'     => User::orderBy('created_at', 'asc')->get(),
            'articles'  => $request->user()->articles()->get(),
            'isAdmin'   => true
        ]);
    }
}
