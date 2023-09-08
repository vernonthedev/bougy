<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //disabling mass assignment out of the box
    protected $guarded = [];

    public function user(){
        //set the onetoone relationship between the user model and the profile model
        return $this->belongsTo(User::class);
    }
}
