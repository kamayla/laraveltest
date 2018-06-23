<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;

class CompsController extends Controller
{
  public function __construct() {
    $this->middleware('company');
  }
  public function index() {
   
    return view('comps.index');
  }

  
}
