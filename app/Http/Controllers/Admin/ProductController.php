<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.products.';
        $this->route = 'products.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Product::orderBy('id', 'DESC')->get();

        return view($this->view. 'index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->pluck('name', 'id');

        return view($this->view. 'create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:250',
            'intro' => 'required|string',
            'description' => 'required|string',
            'author' => 'required|string',
            'demo' => 'required|url',
            'source' => 'required|url',
            'teacher_resources' => 'required|url',
            'status' => 'required|boolean',
            'image' => 'required|image',
            'details_names' => 'required|array',
            'details_names.*' => 'required|string',
            'details_values' => 'required|array',
            'details_values.*' => 'required|string',
        ]);

        $product = Product::create($request->all());
        $product->addMediaFromRequest('image')->toMediaCollection('products');

        foreach ($request->details_names as $key => $name) {
            $product->details()->create([
                'name' => $name,
                'value' => $request->details_values[$key],
            ]);
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->store_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view($this->view. 'show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::whereNull('parent_id')->pluck('name', 'id');
        
        return view($this->view. 'edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:250',
            'intro' => 'required|string',
            'description' => 'required|string',
            'author' => 'required|string',
            'demo' => 'required|url',
            'source' => 'required|url',
            'teacher_resources' => 'required|url',
            'status' => 'required|boolean',
            'image' => 'nullable|image',
            'details_names' => 'required|array',
            'details_names.*' => 'required|string',
            'details_values' => 'required|array',
            'details_values.*' => 'required|string',
        ]);

        $product = Product::findOrFail($id);

        $product->fill($request->all());
        $product->save();
        
        if($request->image && $request->image != null) {
            $product->clearMediaCollection('products');
            $product->addMediaFromRequest('image')->toMediaCollection('products');
        }

        if(sizeof($request->details_names) > 0) {
            $product->details()->delete();

            foreach ($request->details_names as $key => $name) {
                $product->details()->create([
                    'name' => $name,
                    'value' => $request->details_values[$key],
                ]);
            }
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }
}
