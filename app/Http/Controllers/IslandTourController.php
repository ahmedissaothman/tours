<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class IslandTourController extends Controller
{
    public function index()
    {
        $packages = Package::where('type_id', 1)->get(); 
        return view('pages.island_tour', compact('packages')); 
    }
}
