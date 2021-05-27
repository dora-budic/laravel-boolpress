<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function index(string $slug) {
    $category = Category::with('posts')->where('slug','=',$slug)->first();

    return view('guests.posts.index')->with('posts',$category->posts);
  }
}
