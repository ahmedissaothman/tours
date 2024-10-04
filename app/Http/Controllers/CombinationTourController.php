<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class CombinationTourController extends Controller
{
    public function index()
    {
        $packages = Package::where('type_id', 3)->get(); 
        return view('pages.combination_tour', compact('packages')); 
    }
}
