<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    // The route method needs to be named index to match the route update above
    public function brands()
    {
        $brands = Brand::all();
        $phones = Phone::count();
        return view('admin.brands.brand', compact('brands'));
    }

    public function brandShow($id)
    {
        // 1. Fetch the brand by its primary key ID, or throw a 404 error page if not found.
        // We use with('phones') to eager-load all connected products efficiently in one query.
        $brand = Brand::with('phones')->findOrFail($id);

        // 2. Return the dedicated show template and hand over the retrieved object data.
        return view('admin.brands.show', compact('brand'));
    }

    // Show the form to create a new BRAND
    public function create()
    {
        // Change 'admin.phones.create' to 'admin.brands.create' 
        // This forces Laravel to look inside your brands folder, not phones!
        return view('admin.brands.create');
    }

    // Store a newly created BRAND in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.brand')->with('success', 'Brand registered successfully!');
    }


    public function edit($id): View
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    // 2. Process the update request and save changes to the database
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.brand')->with('success', 'Brand name updated successfully!');
    }
}