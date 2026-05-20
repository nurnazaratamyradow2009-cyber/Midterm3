<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Phone;

class BrandController extends Controller
{
    // The route method needs to be named index to match the route update above
    public function brands()
    {
        $brands = Brand::all();
        $phones = Phone::count();
        return view('admin.brands.brand', compact('brands'));
    }
}