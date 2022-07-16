<?php

namespace App\Http\Controllers;

use App\Models\Post as Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->tags = json_encode($request->input('tags'));

        if( $post->save() ){
            return new PostResource( $post );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail( $id );
        return new PostResource( $post );
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
        $post = Post::findOrFail( $request->id );
        $post->title = $request->input('title') ? $request->input('title') : $post->title;
        $post->author = $request->input('author') ? $request->input('author') : $post->author;
        $post->content = $request->input('content') ? $request->input('content') : $post->content;
        $post->tags = $request->has('tags') ? json_encode($request->input('tags')) : $post->tags;
        
        if( $post->save() ){
            return new PostResource( $post );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail( $id );
        if( $post->delete() ){
            return new PostResource( $post );
        }
    }
}
