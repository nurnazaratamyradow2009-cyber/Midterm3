<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\View\View;

class DashboardController extends Controller

{
    public function index(): View
    {
        return view('admin.dashboard.dashboard');
    }
}
