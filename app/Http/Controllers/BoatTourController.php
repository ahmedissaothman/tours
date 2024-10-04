<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class BoatTourController extends Controller
{
    public function index()
    {
        $packages = Package::where('type_id', 2)->get(); 
        return view('pages.boat_tour', compact('packages')); 
    }
}
