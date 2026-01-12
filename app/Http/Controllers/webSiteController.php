<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class webSiteController extends Controller
{
    public function index (){

        $articles = product::latest()->with('image')->paginate(20);
        return view('welcome',compact('articles'));
    }
}
