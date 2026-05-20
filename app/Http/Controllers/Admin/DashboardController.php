<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Phone;
use App\Models\Category;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // 1. Fetch live row counts straight from your database tables
        $totalPhones = Phone::count();
        $totalBrands = Brand::count();
        $totalCategories = Category::count();

        // 2. Pass those values directly into the view array
        return view('admin.dashboard.dashboard', compact('totalPhones', 'totalBrands', 'totalCategories'));
    }
}
