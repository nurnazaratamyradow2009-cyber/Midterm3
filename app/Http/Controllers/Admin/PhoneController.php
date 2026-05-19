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
    public function edit($id)
    {
        $brands = Brand::all(); // Get all brands for the dropdown
        $categories = Category::all(); // Get all brands for the dropdown
        $phone = Phone::findOrFail($id); // Get all brands for the dropdown
        return view('admin.phones.edit', compact('phone', 'brands', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);

        $request->validate([
            'model' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'announced_year' => 'nullable|integer',
            'produced_year' => 'nullable|integer',
            'storage' => 'nullable|string',
            'storage_version' => 'nullable|string',
            'ram' => 'nullable|string',
            'ram_version' => 'nullable|string',
            'is_support_micro_sd' => 'nullable|boolean',
            'first_camera_sensor_MP_value' => 'nullable|numeric',
            'first_camera' => 'nullable|string',
            'screen_type' => 'nullable|string',
            'battery_capacity' => 'nullable|string',
            'charging_speed' => 'nullable|string',
        ]);

        // Get the brand name from the brand_id
        $brand = Brand::findOrFail($request->brand_id);

        // Update all phone attributes in one call
        $phone->update([
            'model' => $request->model,
            'brand_id' => $request->brand_id,
            'brand' => $brand->name,
            'category_id' => $request->category_id,
            'announced_year' => $request->announced_year,
            'produced_year' => $request->produced_year,
            'storage' => $request->storage,
            'storage_version' => $request->storage_version,
            'ram' => $request->ram,
            'ram_version' => $request->ram_version,
            'is_support_micro_sd' => $request->has('is_support_micro_sd'),
            'first_camera_sensor_MP_value' => $request->first_camera_sensor_MP_value,
            'first_camera' => $request->first_camera,
            'screen_type' => $request->screen_type,
            'battery_capacity' => $request->battery_capacity,
            'charging_speed' => $request->charging_speed,
        ]);

        return redirect()->route('admin.phone')->with('success', 'Phone updated successfully');
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
            'model' => 'required',
            'brand_id' => 'required|exists:brands,id'
        ]);

        $phone = new Phone();
        $phone->model = $request->model;
        $phone->brand_id = $request->brand_id;
        $phone->brand = Brand::findOrFail($request->brand_id)?->name ?? '';
        $phone->category = Category::findOrFail($request->category_id)?->name ?? '';
        // ... set other fields ...
        $phone->save();

        return redirect()->route('admin.phone')->with('success', 'Phone created!');
    }
}