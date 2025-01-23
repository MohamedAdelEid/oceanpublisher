<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.categories.';
        $this->route = 'categories.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::orderBy('id', 'DESC')->get();

        return view($this->view. 'index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::whereNull('parent_id')->pluck('name', 'id');

        return view($this->view. 'create', compact('parents'));
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
            'parent_id' => 'nullable|integer|exists:categories,id',
            'name' => 'required|string|max:250',
            'description' => 'required|string|max:250',
            'show_menu' => 'required|boolean',
            'status' => 'required|boolean',
            'image' => 'required|image',
        ]);

        $category = Category::create($request->all());
        $category->addMediaFromRequest('image')->toMediaCollection('categories');

        return redirect()->route($this->route . 'index')->with('flash_success', $this->store_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view($this->view. 'show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::whereNull('parent_id')->pluck('name', 'id');
        
        return view($this->view. 'edit', compact('parents', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'parent_id' => 'nullable|integer|exists:categories,id',
            'name' => 'required|string|max:250',
            'description' => 'required|string|max:250',
            'show_menu' => 'required|boolean',
            'status' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        $category = Category::findOrFail($id);
        
        $category->fill($request->all());
        $category->save();
        
        if($request->image && $request->image != null) {
            $category->clearMediaCollection('categories');
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }
}
