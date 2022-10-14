<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MotorcycleBrand;

class MotorcycleBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Motorcycles Brand';
        $tables = MotorcycleBrand::all();
        return view('operators.motorcyclebrands.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Motorcycle Brand';
        return view('operators.motorcyclebrands.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        MotorcycleBrand::create([
            'brand_name' => $request->name
        ]);
        
        return redirect('/operator/motorcyclebrand')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Motorcycle Brand';
        $tables = MotorcycleBrand::where('id', $id)->first();
        return view('operators.motorcyclebrands.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Motorcycle Brand';
        $data= MotorcycleBrand::where('id', $id)->first();
        return view('operators.motorcyclebrands.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        MotorcycleBrand::where('id', $id)->update([
            'brand_name' => $request->name
        ]);
        
        return redirect('/operator/motorcyclebrand')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MotorcycleBrand::where('id', $id)->delete();
        return redirect('/operator/motorcyclebrand')->with('success', "Data berhasil dihapus");
    }
}
