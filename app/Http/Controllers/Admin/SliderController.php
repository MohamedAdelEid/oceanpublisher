<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.sliders.';
        $this->route = 'sliders.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Slider::all();

        return view($this->view. 'index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view. 'create');
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
            'title' => 'required|string|max:250',
            'link' => 'required|url|max:490',
            'status' => 'required|boolean',
            'image' => 'required|image',
        ]);

        $slider = Slider::create($request->all());

        $slider->addMediaFromRequest('image')->toMediaCollection('sliders');

        return redirect()->route($this->route . 'index')->with('flash_success', $this->store_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $data = $slider;

        return view($this->view. 'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title' => 'required|string|max:250',
            'link' => 'required|url|max:490',
            'status' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        $slider->fill($request->all());
        $slider->save();

        if($request->image && $request->image != null) {
            $slider->clearMediaCollection('sliders');
            $slider->addMediaFromRequest('image')->toMediaCollection('sliders');
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }
}
