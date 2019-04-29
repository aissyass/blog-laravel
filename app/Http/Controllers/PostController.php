<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with(['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with([
            'categorires' => Category::all(),
            'tags'        => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title"       => "required",
            "content" => "required",
            "featured"    => "required|image",
            "category_id" => "required",
        ]);

        // Make a name of the photo Unique (change the name)
        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('imgs/posts', $featured_new_name);

        // Add the post to database
        $post = Post::create([
            "title"       => $request->title,
            "slug"       => str_slug($request->title),
            "content"     => $request->content,
            "featured"    => $featured_new_name,
            "category_id" => $request->category_id,
        ]);

        // Attach posts to Tags
        $post->tags()->attach($request->tags);

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit')->with([
            'post' => Post::find($id),
            'categorires' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title"       => "required",
            "content" => "required",
            "category_id" => "required",
        ]);

        $post = Post::find($id);

        $post->title =  $request->title;
        $post->slug = str_slug($request->title);
        $post->content = $request->content;
        $post->category_id =  $request->category_id;

        // Check if choose a new photo
        if($request->hasFile('featured')) {
            // Make a name of the photo Unique (change the name)
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('imgs/posts', $featured_new_name);

            $post->featured = $featured_new_name;
        }
        $post->tags()->sync($request->tags);
        $post->save();

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();    
        return redirect()->back();
    }

    public function trashed()
    {
        return view('posts.trashed')->with(['posts' => Post::onlyTrashed()->get()]);
    }

    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        Post::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}
