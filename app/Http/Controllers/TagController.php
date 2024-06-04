<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TagController extends Controller implements HasMiddleware
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
        $tags=Tag::all();
       return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.index');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        
        Tag::create([
            'name'=> $request->name,
           
           
        ]);
        return redirect()->route('tags.index')->with('success', 'Creazione Tag avvenuta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.index',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=> $request->name,
            
           
            
        ]);
        return redirect()->route('tags.index')->with('success', 'Modifica Tag avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Cancellazione Tag avvenuta con successo!');
    }
}
