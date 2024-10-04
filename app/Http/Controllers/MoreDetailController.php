<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class MoreDetailController extends Controller
{
    public function show($id)
    {
        $package = Package::findOrFail($id);

        return view('pages.more_detail', compact('package'));
    }
}
