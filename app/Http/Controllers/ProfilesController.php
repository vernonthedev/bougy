<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user){
        // $user = User::findOrFail($user);
        return view('profiles.index',compact('user'));
    }

    public function edit(User $user){
        //set the authorisation policy | the user cannot access this specific page without being authorised
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        $data= request()->validate([
            'title'=>"required",
            'description'=>"required",
            'url'=>"url",
            "image"=>"",
        ]);


        //only if the user has selected the new updated image
        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            //use the resize package to default resize the images
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
        }

        //grab the authenticated user to only update his profile
        auth()->user()->profile->update(array_merge(
            $data,
            ["image"=>$imagePath],
        ));

        return redirect("/profile/{$user->id}");

    }
}
