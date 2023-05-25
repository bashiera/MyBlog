<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        // dd($request->tags);
        $request->validate(
            [
                'title' => 'required|string|min:20|max:255',
                'category_id' => 'required|numeric|exists:categories,id',
                'tags' => 'required|exists:tags,id',
                'author_name' => 'required|string|min:3',
                'author_image' => 'required|active_url',
                'image' => 'required|active_url',
                'content' => 'required|min:25|max:1000',
            ]
        );

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = Str::lower(str_replace(' ', '-', $request->title));
        $post->author_name = $request->author_name;
        $post->author_image = $request->author_image;
        $post->image = $request->image;
        $post->content = $request->content;
        $post->save();
        $post->tags()->attach($request->tags);
        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.showPost', ['post' => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $request->validate(
            [
                'title' => 'string|min:20|max:255',
                'author_name' => 'string|min:3',
                'category_id' => 'numeric|exists:categories,id',
                'author_image' => 'active_url',
                'image' => 'active_url',
                'content' => 'min:25|max:1000',
            ]
        );
        $post->title = $request->title;
        $post->slug = Str::lower(str_replace(' ', '-', $request->title));
        $post->author_name = $request->author_name;
        $post->author_image = $request->author_image;
        $post->image = $request->image;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('posts.update', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
