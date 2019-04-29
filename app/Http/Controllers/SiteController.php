<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.index')->with([
            'settings'   => Setting::first(),
            'categories' => Category::all()->take(5),
            'tags'       => Tag::all()->take(10),
            'firstpost'  => Post::orderBy('created_at', 'desc')->first(),
            'secondpost' => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'thirdpost'  => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
            'recentposts'  => Post::orderBy('created_at', 'desc')->skip(3)->take(PHP_INT_MAX)->get(),
        ]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(!isset($post)) {
            return redirect()->route('siteIndex');
        }

        $post_prev = Post::where('id', '>', $post->id)->min('id');
        $post_next = Post::where('id', '<', $post->id)->max('id');

        return view('frontend.post')->with([
            'settings'   => Setting::first(),
            'categories' => Category::all()->take(5),
            'tags'       => Tag::all()->take(10),
            'post'       => $post,
            'post_prev'  => Post::find($post_prev),
            'post_next'  => Post::find($post_next),
        ]);
    }
    
    public function category($id)
    {
        $category_posts = Category::find($id);

        return view('frontend.category')->with([
            'settings'       => Setting::first(),
            'categories'     => Category::all()->take(5),
            'tags'           => Tag::all()->take(10),
            'firstpost'      => Post::orderBy('created_at', 'desc')->first(),
            'secondpost'     => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'thirdpost'      => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
            'category_posts' => $category_posts->posts ?? null
        ]);
    }

    public function tag($id)
    {
        $tag_posts = Tag::find($id);

        return view('frontend.tag')->with([
            'settings'       => Setting::first(),
            'categories'     => Category::all()->take(5),
            'tags'           => Tag::all()->take(10),
            'firstpost'      => Post::orderBy('created_at', 'desc')->first(),
            'secondpost'     => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'thirdpost'      => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
            'tag_posts'      => $tag_posts->posts ?? null
        ]);
    }

    public function search(){
        $posts = Post::where('title', 'LIKE', '%'.request('search').'%')->get();
        
        return view('frontend.search')->with([
            'settings'       => Setting::first(),
            'categories'     => Category::all()->take(5),
            'tags'           => Tag::all()->take(10),
            'firstpost'      => Post::orderBy('created_at', 'desc')->first(),
            'secondpost'     => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'thirdpost'      => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
            'search_post'    => $posts ?? null
        ]);
    }
}
