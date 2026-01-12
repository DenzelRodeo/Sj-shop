<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor; 
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{public function index()
{
    
    $vendor = Auth::guard('vendor')->user();

    return view('profile.index', compact('vendor'));
}
}