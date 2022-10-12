<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = [];
        $title = 'Addresses';
        $tables = UserAddress::with('user')->with('address')->where('user_id', Auth::user()->id)->get();
        return view('pages.addresses.index', compact([
            'tables', 'title', 'orders'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Addresses';
        return view('pages.addresses.create', compact('title'));
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

        Address::create([
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
        $title = 'Addresses';
        $tables = Address::with('motorcycle_type')->with('motorcycle_brand')->where('id', $id)->first();
        return view('pages.addresses.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Addresses';
        $tables = Address::with('motorcycle_type')->with('motorcycle_brand')->where('id', $id)->first();
        return view('pages.addresses.edit', compact('title', 'tables'));
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

        Address::where('id', $id)->update([
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
        Address::where('id', $id)->delete();
        return redirect('/u/author')->with('success', "Data berhasil dihapus");
    }
}
