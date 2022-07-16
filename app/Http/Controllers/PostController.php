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
            return response()->json($post, 201);
        } else{
            return response()->json([
                "message" => "Não foi possíve cadastrar a postagem"
              ], 404);
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
        $post = Post::find( $id );
        if( $post ){
            return new PostResource( $post );
        } else{
            return response()->json([
                "message" => "Registro de id = $id não foi encontrado"
              ], 404);
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  string  $tag
     * @return \Illuminate\Http\Response
     */
    public function tag($tag)
    {
        $posts = Post::whereJsonContains('tags', $tag)->get();
        if (sizeof($posts) > 0){
            return PostResource::collection($posts);
        } else{
            return response()->json([
                "message" => "Não há nenhuma postagem com a tag $tag"
              ], 404);
        }
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
        $post = Post::find( $request->id );
        if( $post ){
            $post->title = $request->input('title') ? $request->input('title') : $post->title;
            $post->author = $request->input('author') ? $request->input('author') : $post->author;
            $post->content = $request->input('content') ? $request->input('content') : $post->content;
            $post->tags = $request->has('tags') ? json_encode($request->input('tags')) : $post->tags;
            $post->save();
            return response()->json($post, 200);
        } else{
            return response()->json([
                "message" => "Registro de id = $id não foi encontrado"
              ], 404);
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
        $post = Post::find( $id );
        if ($post){
            $post->delete();
            return response()->json([
                "message" => "Registro de id = $id foi excluído"
              ], 200);
        } else{
            return response()->json([
                "message" => "Registro de id = $id não foi encontrado"
              ], 404);
        }
    }
}
