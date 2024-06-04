<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{

    
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        
       return view('users.index',compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

  
  
}
