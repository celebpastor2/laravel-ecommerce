<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Product extends Model
{
    //
    public $fillable = [
        "name",
        "description",
        "price",
        "image",
        "user_id"
    ];
    #business logic, talks how the website will
    public function user(){
        return $this->belongsTo(User::class);//one user object connected to this
    }

    public function tags(){
        return $this->belongsToMany(Tags::class);
    }
}
