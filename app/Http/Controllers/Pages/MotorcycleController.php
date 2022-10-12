<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $row = UserOwner::where('user_id', Auth::user()->id)->first();
        $title = 'Motorcycles';
        $tables = Motorcycle::with('motorcycle_type')->with('motorcycle_brand')
                    ->where('user_owner_id', $row->id)->get();
        return view('pages.motorcycles.index', compact([
            'tables', 'title'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Motorcycles';
        return view('pages.motorcycles.create', compact('title'));
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

        Motorcycle::create([
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
        $title = 'Motorcycles';
        $tables = Motorcycle::with('motorcycle_type')->with('motorcycle_brand')
                    ->where('user_id', Auth::user()->id)
                    ->where('id', $id)->first();
        return view('pages.motorcycles.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Motorcycles';
        $tables = Motorcycle::with('motorcycle_type')->with('motorcycle_brand')
                    ->where('user_id', Auth::user()->id)
                    ->where('id', $id)->first();
        return view('pages.motorcycles.edit', compact('title', 'tables'));
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

        Motorcycle::where('id', $id)->update([
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
        Motorcycle::where('id', $id)->delete();
        return redirect('/u/author')->with('success', "Data berhasil dihapus");
    }
}
