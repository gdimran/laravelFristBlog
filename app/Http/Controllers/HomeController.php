<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $post=DB::table('post')->join('categories', 'posts.cat_id','categories.id')
      ->select('posts.*', 'categories.cat_name', 'categories.slug')
      ->get();
      return view('pages.index', compact('post'));
    }
}
