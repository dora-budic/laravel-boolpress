<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
  public function index(string $slug) {
    $tag = Tag::with('posts')->where('slug','=',$slug)->first();

    return view('guests.posts.index')->with('posts',$tag->posts);
  }

}
