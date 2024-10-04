<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;


class PackageController extends Controller
{

    public function index()
    {
        $packages = Package::with('type')->get();
        return view('admin-page.view_package', compact('packages'));
    }

    public function show($id)
{
    $package = Package::findOrFail($id);
    return view('pages.more_detail', compact('package'));
    // $relatedPackages = Package::where('id', '!=', $id)
    //     ->whereNull('deleted_at') 
    //     ->take(3) 
    //     ->get();

    // if ($relatedPackages->isEmpty()) {
    //     $relatedPackages = Package::whereNull('deleted_at')->take(3)->get();
    // }

    

}

public function totalPackages()
{
    $totalPackages = Package::count(); // Count all packages
    return response()->json(['total_packages' => $totalPackages]);
}





    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type_id' => 'required|integer',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $fileName);
        $validated['image'] = 'images/' . $fileName; 
    }

    // Save the package
    Package::create($validated);

    return redirect()->back()->with('success', 'Package added successfully.');
    
}

public function update(Request $request, $id)
{
    // Validate form input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'type_id' => 'required|integer',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048', 
    ]);

    $package = Package::findOrFail($id);

    $package->name = $validatedData['name'];
    $package->type_id = $validatedData['type_id'];
    $package->price = $validatedData['price'];
    $package->description = $validatedData['description'];

    if ($request->hasFile('image')) {
        if ($package->image && file_exists(public_path($package->image))) {
            unlink(public_path($package->image));
        }

        $image = $request->file('image');
        $fileName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $fileName);
        $validatedData['image'] = 'images/' . $fileName;
    }

    $package->save();

    return redirect()->back()->with('success', 'Package updated successfully!');
}

    public function destroy($id)
    {
    $package = Package::findOrFail($id);

    $package->delete();

    return redirect()->back()->with('success', 'Package deleted successfully.');
    }
}
