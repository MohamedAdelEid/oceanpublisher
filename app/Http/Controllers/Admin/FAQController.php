<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.faqs.';
        $this->route = 'faqs.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = FAQ::orderBy('id', 'DESC')->get();

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
            'body' => 'required|string',
            'status' => 'required|boolean',
        ]);

        FAQ::create($request->all());

        return redirect()->route($this->route . 'index')->with('flash_success', $this->store_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        return view($this->view. 'show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view($this->view. 'edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $faq)
    {
        $this->validate($request, [
            'title' => 'required|string|max:250',
            'body' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $faq->fill($request->all());
        $faq->save();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }
}
