<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //add middleware whereby someone can't access the post page without being authenticated
    //by declaring it through the constructor
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            // 'another'=> '',
            'caption'=>'required',
            'image'=>'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        //use the resize package to default resize the images
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //get the authenticated user
        auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'image'=> $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    //controller view to show the specific post and image when selected
    public function show(\App\Models\Post $post){
        return view('posts.show', compact('post'));
    }


}
