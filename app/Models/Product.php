<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image()
    {
       return $this->belongsTo(cloudFile::class,'cloud_file_id');

    }

    

public function category()
{
    // Un produit "appartient à" une catégorie
    return $this->belongsTo(Category::class);
}


    

    
    //
    
    protected $fillable = [
        'name',
       'description',
       'price',
      'vendor_id',
    ];
}
