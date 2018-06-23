<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;
use Auth;
use App\Admin;

class PostsController extends Controller
{
  public function __construct() {
    $this->middleware('admin');
  }
  public function index() {
    // $post = Post::all();
    // $post = Post::orderBy('created_at', 'desc')->get();
    $posts = Post::latest()->get(); // orderBy('created_at', 'desc')と同じ。
    $user = Auth::guard('admin')->user();
    dd($user);
    return view('posts.index')->with('posts',$posts);
  }

  public function show(Post $post) {
    // $post = Post::findOrFail($id); // findで見つからなかった時は例外を返す。
    return view('posts.show')->with('post',$post);
  }

  public function create() {
    $tags = Tag::all();
    return view('posts.create')->with('tags',$tags);
  }

  public function store(PostRequest $request){

    $post = new Post();
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();
    $tagArray = [];

    foreach ($request->tag as $tag) {
      $tagArray[] = (Tag::find($tag));
    }

    foreach ($tagArray as $tagtag) {
      $post->tags()->save($tagtag);
    }


    return redirect('/');
  }


  public function edit(Post $post) {
    return view('posts.edit')->with('post', $post);
  }

  public function update(Post $post, PostRequest $request) {

    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();

    return redirect('/admin');

  }

  public function destroy (Post $post) {
    $post->delete();
    return redirect('/');
  }
}
