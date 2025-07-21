<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tags extends Model
{
    //
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
