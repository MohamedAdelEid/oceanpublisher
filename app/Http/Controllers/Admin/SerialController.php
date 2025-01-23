<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Serial;
use App\Models\Product;
use App\Exports\SerialExporter;
use Maatwebsite\Excel\Facades\Excel;

class SerialController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'adminAuth']);

        $this->view = 'portal.serials.';
        $this->route = 'serials.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->product) {
            $list = Serial::with('product')->where('product_id', $request->product)->orderBy('id', 'DESC')->get();
        } else {
            $list = Serial::with('product', 'product.serials')->groupBy('product_id')->orderBy('id', 'DESC')->get();
        }

        return view($this->view. 'index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('title', 'id');

        return view($this->view. 'create', compact('products'));
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
            'product_id' => 'required|integer|exists:products,id',
            'count' => 'required|numeric',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'is_valid' => 'required|boolean',
            'need_export' => 'required|boolean',
        ]);

        $serialsCreated = [];
        for ($i=1; $i <= $request->count; $i++)
        {
            $number = getUniqId('App\Models\Serial', 'number');
            $request->merge([ "number" => $number ]);
    
            $serial = Serial::create($request->all());
            
            array_push($serialsCreated, $serial->id);
        }
        
        if($request->need_export) {
            $product = Product::find($request->product_id);
            $file_name = $product->title.'-serials.csv';

            $serialsList = Serial::select(['id', 'number', 'startdate', 'enddate'])->whereIn('id', $serialsCreated)->get();
            
            return Excel::download(new SerialExporter($serialsList), $file_name);
        }

        return redirect()->route($this->route . 'index')->with('flash_success', $this->store_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route($this->route . 'index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serial = Serial::findOrFail($id);
        $products = Product::pluck('title', 'id');
        
        return view($this->view. 'edit', compact('products', 'serial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'is_valid' => 'required|boolean',
        ]);

        $serial = Serial::findOrFail($id);
        
        $serial->fill($request->all());
        $serial->save();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serial = Serial::findOrFail($id);
        $serial->delete();

        return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
    }


    /**
     * Show the form for editing the specified resources.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function editGroup($product_id)
    {
        $product = Product::with(['serials' => fn($query) => $query->where('is_valid', true)])->findOrFail($product_id);
   
        return view($this->view. 'edit-group', compact('product'));
    }

    /**
     * Update the specified group of resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function updateGroup(Request $request, $product_id)
    {
        // Update Multi Serials Rows.
        if($request->has('update'))
        {
            $this->validate($request, [
                'startdate' => 'required|date',
                'enddate' => 'required|date',
                'is_valid' => 'required|boolean',
                'serials_ids' => 'required|array',
            ]);

            foreach ($request->serials_ids as $id)
            {
                $serial = Serial::findOrFail($id);
                $serial->startdate = $request->startdate;
                $serial->enddate = $request->enddate;
                $serial->is_valid = $request->is_valid;
                $serial->save();
            }
            
            return redirect()->route($this->route . 'index')->with('flash_success', $this->update_message);
        }
        // Delete Multi Serials Rows.
        else if($request->has('delete'))
        {
            $this->validate($request, [
                'serials_ids' => 'required|array',
            ]);

            foreach ($request->serials_ids as $id)
            {
                $serial = Serial::findOrFail($id)->delete();
            }

            return redirect()->route($this->route . 'index')->with('flash_success', $this->delete_message);
        }

    }
}
