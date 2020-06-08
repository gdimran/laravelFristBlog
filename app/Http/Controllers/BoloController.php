<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoloController extends Controller
{
  public function Bolo(){
    return view('pages.contact');
  }

  public function Blog(){
    return view('blog');
  }

}
