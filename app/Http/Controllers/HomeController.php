<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
                    ->with('posts_count',Post::all()->count())
                    ->with('thrashed_count',Post::onlyTrashed()->get()->count())
                    ->with('category_count',Category::all()->count())
                    ->with('users_count',User::all()->count());
    }
}
