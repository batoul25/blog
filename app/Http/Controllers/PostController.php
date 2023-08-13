<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts= auth()->user()->post()->paginate(5);
        return response()->json([
            'status' => 'success',
            'posts' => $posts,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $inputs = $request->validate([
           'title'=> 'required | min:8',
           'image'=> 'mimes:jpeg,png',
           'category'=>'required',
           'content'=>'required'
       ]);
      if(\request('image')){
          $inputs['image'] = \request('image')->store('images');

      }
      auth()->user()->post()->create($inputs);
        \Illuminate\Support\Facades\Session::flash('post-created-message','Post '.$inputs['title'].' Was Created');

        return response()->json([
            'status' => 'success',
            'message' => 'Post Was Created',
            'posts' => $inputs,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $post = Post::findOrFail($post->id);
        return response()->json([
            'status' => 'success',
            'post' => $post,
        ]);




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $this->authorize('view', $post);
       return view('posts.edit' , ['post'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $inputs = \request()->validate([
            'title' => 'required | min:8',
            'filename' => 'mimes:jpeg,png',
            'category' => 'required',
            'content' => 'required'
        ]);


        if (\request('filename')) {
            $inputs['filename'] = \request('image')->store('images');
            $post->images()->filename = $inputs ['filename'];

        }
        $post->title = $inputs['title'];
        $post->categories()->name = $inputs['category'];
        $post->content = $inputs['content'];

        $this->authorize('update', $post);
        $post->update();

        \Illuminate\Support\Facades\Session::flash('post-updated-message', 'Post ' . $inputs['title'] . ' Was Updated');
        return response()->json([
            'status' => 'success',
            'message' => 'Post updated successfully',
            'post' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('delete' , $post);
        $post->delete();
        \Illuminate\Support\Facades\Session::flash('message' , 'Post Was Deleted');
        return response()->json([
            'status' => 'success',
            'message' => 'Post deleted successfully',
            'post' => $post,
        ]);

    }
}
