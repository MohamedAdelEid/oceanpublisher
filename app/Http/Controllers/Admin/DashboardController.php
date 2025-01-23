<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Serial;

class DashboardController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'adminAuth']);
        // parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['mainCategories'] = Category::whereNull('parent_id')->count();
        $data['subCategories'] = Category::whereNotNull('parent_id')->count();
        $data['products'] = Product::all()->count();
        $data['serials'] = Serial::all()->count();

        return view('portal.dashboard', compact('data'));
    }
}
