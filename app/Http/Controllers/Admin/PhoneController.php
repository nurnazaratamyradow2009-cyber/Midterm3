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
        return view('admin.phones.edit', compact('phone', 'brands'));
    }
    public function update(Request $request, $id)
    {   $phone = Phone::findOrFail($id);
        
        $request->validate([
            'brand_id'         => 'required|exists:brands,id',
            'category_id'      => 'required|exists:categories,id',
            'announced_year'   => 'nullable|integer',
            'produced_year'    => 'nullable|integer',
            'storage'          => 'nullable|string',
            'storage_version'  => 'nullable|string',
            'ram'              => 'nullable|string',
            'ram_version'      => 'nullable|string',
        ]);

        // Update the phone attributes with request data
        $phone->update([
            'brand_id'         => $request->brand_id,
            'category_id'      => $request->category_id,
            'announced_year'   => $request->announced_year,
            'produced_year'    => $request->produced_year,
            'storage'          => $request->storage,
            'storage_version'  => $request->storage_version,
            'ram'              => $request->ram,
            'ram_version'      => $request->ram_version,
        ]);

        // General & Performance
        $phone->model = $request->model;
        $phone->brand_id = $request->brand_id;
        $phone->announced_year = $request->announced_year;
        $phone->storage = $request->storage;
        $phone->ram = $request->ram;
        $phone->is_support_micro_sd = $request->has('is_support_micro_sd');

        // Camera
        $phone->first_camera_sensor_MP_value = $request->first_camera_sensor_MP_value;
        $phone->first_camera = $request->first_camera;

        // Display & Battery
        $phone->screen_type = $request->screen_type;
        $phone->battery_capacity = $request->battery_capacity;
        $phone->charging_speed = $request->charging_speed;

        $phone->save();

        return redirect()->route('admin.phone')->with('success', 'Phone updated successfully');
    }
}