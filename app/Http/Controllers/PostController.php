<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PostController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware('auth', except:['show','index']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Post::paginate(10); 
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $tags=Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, $user)
    {
    //    dd($request);
        $post= Post::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=>$user                             

        ]);

        $post->tags()->attach($request->tags);
        return redirect()->route('posts.index')->with('success', 'Creazione Post avvenuta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags=Tag::all();
        
        return view('posts.edit',compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=>$request->user_id 
            
        ]);
        $post->tags()->detach();
        $post->tags()->attach($request->tags);
        //  $book->categories()->sync($request->categories);

        return redirect()->route('posts.index')->with('success', 'Modifica Post avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Cancellazione Post avvenuta con successo!');
    }
}
