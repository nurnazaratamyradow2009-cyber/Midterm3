<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Brand;
use App\Models\Category;

class PhoneController extends Controller
{
    public function phones()
    {
        $phones = Phone::all();
        return view('admin.phones.phone', compact('phones'));
    }

    public function phoneShow($id)
    {
        $phone = Phone::findOrFail($id);
        return view('admin.phones.show', compact('phone'));
    }

    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();

        return redirect()->route('admin.phone')->with('success', 'Phone deleted successfully');
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.phones.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'processor' => 'nullable|string',
            'screen_refresh_rate' => 'nullable|integer',

            'back_camera_count' => 'nullable|integer',
            'front_camera_count' => 'nullable|integer',

            'first_camera_mp' => 'nullable|integer',
            'second_camera_mp' => 'nullable|integer',
            'third_camera_mp' => 'nullable|integer',
            'fourth_camera_mp' => 'nullable|integer',
            'fifth_camera_mp' => 'nullable|integer',

            'first_front_camera_mp' => 'nullable|integer',
            'second_front_camera_mp' => 'nullable|integer',
        ]);

        $brand = Brand::findOrFail($request->brand_id);

        Phone::create([
            'model' => $request->model,
            'brand_id' => $request->brand_id,
            'brand' => $brand->name, // Pulling string name automatically
            'category_id' => $request->category_id,
            'processor' => $request->processor,
            'screen_refresh_rate' => $request->screen_refresh_rate,

            'back_camera_count' => $request->back_camera_count ?? 0,
            'front_camera_count' => $request->front_camera_count ?? 0,

            'first_camera_mp' => $request->first_camera_mp,
            'second_camera_mp' => $request->second_camera_mp,
            'third_camera_mp' => $request->third_camera_mp,
            'fourth_camera_mp' => $request->fourth_camera_mp,
            'fifth_camera_mp' => $request->fifth_camera_mp,

            'first_front_camera_mp' => $request->first_front_camera_mp,
            'second_front_camera_mp' => $request->second_front_camera_mp,
        ]);

        return redirect()->route('admin.phone')->with('success', 'Phone created successfully!');
    }

    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $phone = Phone::findOrFail($id);
        return view('admin.phones.edit', compact('phone', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);

        $request->validate([
            'model' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'processor' => 'nullable|string',
            'screen_refresh_rate' => 'nullable|integer',

            'back_camera_count' => 'nullable|integer',
            'front_camera_count' => 'nullable|integer',

            'first_camera_mp' => 'nullable|integer',
            'second_camera_mp' => 'nullable|integer',
            'third_camera_mp' => 'nullable|integer',
            'fourth_camera_mp' => 'nullable|integer',
            'fifth_camera_mp' => 'nullable|integer',

            'first_front_camera_mp' => 'nullable|integer',
            'second_front_camera_mp' => 'nullable|integer',
        ]);

        $brand = Brand::findOrFail($request->brand_id);

        $phone->update([
            'model' => $request->model,
            'brand_id' => $request->brand_id,
            'brand' => $brand->name,
            'category_id' => $request->category_id,
            'processor' => $request->processor,
            'screen_refresh_rate' => $request->screen_refresh_rate,

            'back_camera_count' => $request->back_camera_count ?? 0,
            'front_camera_count' => $request->front_camera_count ?? 0,

            'first_camera_mp' => $request->first_camera_mp,
            'second_camera_mp' => $request->second_camera_mp,
            'third_camera_mp' => $request->third_camera_mp,
            'fourth_camera_mp' => $request->fourth_camera_mp,
            'fifth_camera_mp' => $request->fifth_camera_mp,

            'first_front_camera_mp' => $request->first_front_camera_mp,
            'second_front_camera_mp' => $request->second_front_camera_mp,
        ]);

        return redirect()->route('admin.phone')->with('success', 'Phone updated successfully');
    }
}