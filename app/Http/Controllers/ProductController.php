<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   
public function create()
{
    
    $categories = \App\Models\Category::all();
    return view('dashboard.vendors.articles.create', compact('categories'));
}
}
