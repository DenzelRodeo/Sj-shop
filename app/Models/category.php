<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product; // <--- VÉRIFIEZ CETTE LIGNE

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image'];

    // La relation qui était en rouge
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}