<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        $dati_posts = Post::all();
        $data = [
            'posts' => $dati_posts
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $data = [
            'tags' => $tags
        ];
        return view('admin.posts.create',  $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'titolo' => ['required',Rule::unique('posts')->ignore($post),'max:100'],
            'content' => 'required'
            ]);
            $post->user_id = Auth::id();
            $post->slug = Str::slug($data['titolo']);
            $post->fill($data);
            $post->save();
            
            if($request->has('tags')){
                $post->tags()->sync($request['tags']);
            }
        
            return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug);
        if($post){
            $data = [
                'post' => $post
            ];
            return view('admin.posts.show', $data);
        }
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        if($post){
            $data = [
                'post' => $post,
                'tags' => $tags 
            ];
            return view('admin.posts.edit', $data);
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'titolo' => ['required',Rule::unique('posts')->ignore($post),'max:100'],
            'content' => 'required'
            ]);

        if($request->has('tags')){
            $post->tags()->sync($request['tags']);
        }
        $post->update($data);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('post.index');
    }
}
