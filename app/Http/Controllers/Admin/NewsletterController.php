<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.newsletters.';
        $this->route = 'newsletters.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Newsletter::orderBy('id', 'DESC')->get();

        return view($this->view. 'index', compact('list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }
}
