<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Lookup;

class LookupController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.lookups.';
        $this->route = 'lookups.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lookup::first();

        return view($this->view. 'index', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookup  $lookup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lookup $lookup)
    {
        if($request->section == 'info') {
            $this->validate($request, [
                'admin_prefix' => 'required|string|max:250',
                'title' => 'required|string|max:250',
                'meta_tags' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|string',
                'whatsapp' => 'required|string',
                'facebook' => 'required|string',
                'twitter' => 'required|string',
                'instagram' => 'required|string',
                'about_image' => 'nullable|image',
                'logo' => 'nullable|image',
                'favicon' => 'nullable|image',
            ]);
        }
        else if($request->section == 'pages') {
            $this->validate($request, [
                'about_us' => 'required|string',
                'mission' => 'required|string',
                'vision' => 'required|string',
                'goals' => 'required|string',
                'privacy_policy' => 'required|string',
                'terms_conditions' => 'required|string',
                'pages_seo' => 'required|array',
                'pages_seo.home_title' => 'required|string',
                'pages_seo.home_description' => 'required|string',
                'pages_seo.about_title' => 'required|string',
                'pages_seo.about_description' => 'required|string',
                'pages_seo.contact_title' => 'required|string',
                'pages_seo.contact_description' => 'required|string',
                'pages_seo.faqs_title' => 'required|string',
                'pages_seo.faqs_description' => 'required|string',
                'pages_seo.privacy_title' => 'required|string',
                'pages_seo.privacy_description' => 'required|string',
                'pages_seo.terms_title' => 'required|string',
                'pages_seo.terms_description' => 'required|string',
                'pages_seo.account_title' => 'required|string',
                'pages_seo.account_description' => 'required|string',
            ]);
        }

        $lookup->fill($request->all());
        $lookup->save();

        if($request->section == 'info') {
            if($request->about_image && $request->about_image != null) {
                $lookup->clearMediaCollection('lookup_about');
                $lookup->addMediaFromRequest('about_image')->toMediaCollection('lookup_about');
            }
            if($request->logo && $request->logo != null) {
                $lookup->clearMediaCollection('lookup_logo');
                $lookup->addMediaFromRequest('logo')->toMediaCollection('lookup_logo');
            }
            if($request->favicon && $request->favicon != null) {
                $lookup->clearMediaCollection('lookup_favicon');
                $lookup->addMediaFromRequest('favicon')->toMediaCollection('lookup_favicon');
            }
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }
}
