<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\MotorcycleType;
use Illuminate\Http\Request;

class MotorcycleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Motorcycle Types';
        $tables = MotorcycleType::withCount('motorcycle')->get();
        return view('operators.motorcycletypes.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Motorcycle Types';
        return view('operators.motorcycletypes.create', compact('title'));
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

        MotorcycleType::create([
            'name' => $request->name
        ]);
        
        return redirect('/u/author')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Motorcycle Types';
        $tables = MotorcycleType::where('id', $id)->first();
        return view('operators.motorcycletypes.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Motorcycle Types';
        $tables = MotorcycleType::where('id', $id)->first();
        return view('operators.motorcycletypes.edit', compact('title', 'tables'));
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

        MotorcycleType::where('id', $id)->update([
            'name' => $request->name
        ]);
        
        return redirect('/u/author')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MotorcycleType::where('id', $id)->delete();
        return redirect('/u/author')->with('success', "Data berhasil dihapus");
    }
}
