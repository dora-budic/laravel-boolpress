<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::All();

      return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'exists:categories,id|nullable',
        'cover' => 'image|max:2000|nullable'
      ]);

      $data = $request->all();

      $cover = NULL;
      if(array_key_exists('cover', $data)) {
        $cover = Storage::put('uploads',$data['cover']);
      }

      $post = new Post();
      $post->fill($data);

      $post->slug = $this->generateSlug($post->title);
      $post->cover = 'storage/' . $cover;
      $post->save();

      return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
      $post = Post::where('slug','=',$slug)->first();

      return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $categories = Category::All();

      return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'exists:categories,id|nullable',
        'cover' => 'image|max:2000|nullable'
      ]);

      $data = $request->all();

      $data['slug'] = $this->generateSlug($data['title'], $post->title != $data['title'],$post->slug);

      if(array_key_exists('cover', $data)) {
        $cover = Storage::put('uploads',$data['cover']);
        $data['cover'] = 'storage/' . $cover;
      }

      $post->update($data);

      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();

      return redirect()->route('admin.posts.index');
    }

    private function generateSlug(string $title, bool $change = true, string $old_slug = '') {

      if (!$change) {
        return $old_slug;
      }

      $slug = Str::slug($title,'-');
      $slug_base = $slug;
      $contatore = 1;

      $post_with_slug = Post::where('slug','=',$slug)->first();
      while($post_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $post_with_slug = Post::where('slug','=',$slug)->first();
      }
      return $slug;
    }
}
