<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // $foods = Food::inRandomOrder()->limit(4)->get();
        
        // // dd($foods);

        // $restaurants = Restaurant::inRandomOrder()->limit(4)->get();

        // $categories = Category::get();

        // return view('client.home.index', compact('foods', 'restaurants', 'categories'));
    }

    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
