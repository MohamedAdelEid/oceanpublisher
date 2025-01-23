<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.users.';
        $this->route = 'users.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::orderBy('id', 'desc')->get();

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
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'email' => 'required|string|email|max:250|unique:users',
            'phone' => 'required|string|phone|max:250|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'job' => 'required|string',
            'school' => 'required|string',
            'is_admin' => 'required|boolean',
            'status' => 'required|string',
            'avatar' => 'nullable|image',
        ]);

        $request->merge([
            'full_name' => $request->first_name .' '.$request->last_name,
            'password' => Hash::make($request->password)
        ]);
        $user = User::create($request->all());

        if($request->avatar && $request->avatar != null) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->store_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view($this->view. 'show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view($this->view. 'edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'email' => 'required|string|email|max:250|unique:users,id,'.$user->id,
            'phone' => 'required|string|phone|max:250|unique:users',
            'password' => 'nullable|string|min:8|confirmed',
            'job' => 'required|string',
            'school' => 'required|string',
            'is_admin' => 'required|boolean',
            'status' => 'required|string',
            'avatar' => 'nullable|image',
        ]);

        $request->merge([ 'full_name' => $request->first_name .' '.$request->last_name ]);
        if($request->password == null) {
            $request->request->remove('password');
        } else {
            $request->merge([ 'password' => Hash::make($request->password) ]);
        }
        
        $user->fill($request->all());
        $user->save();

        if($request->avatar && $request->avatar != null) {
            $user->clearMediaCollection('avatars');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }
}
