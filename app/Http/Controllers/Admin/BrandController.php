<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brands() {


        $brands = Brand::all();


        return view('admin.brands.brand', compact('brands'));
    }

    
}
