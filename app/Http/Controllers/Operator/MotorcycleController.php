<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Motorcycle;
use App\Models\MotorcycleBrand;
use App\Models\MotorcycleType;
use App\Models\UserOwner;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Motorcycle';
        $tables = Motorcycle::all();
        return view('operators.motorcycles.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Motorcycle';
        return view('operators.motorcycles.create', compact('title'));
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
        
        return redirect('/operator/motorcycle')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Motorcycle';
        $tables = Motorcycle::where('id', $id)->first();
        return view('operators.motorcycles.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Motorcycle';
        $tables = Motorcycle::where('id', $id)->first();
        $owners = UserOwner::all();
        $brands = MotorcycleBrand::all();
        $types = MotorcycleType::all();
        // dd($owners);
        return view('operators.motorcycles.edit', compact('title', 'tables', 'owners', 'brands', 'types'));
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
        // dd(Motorcycle::where('id', $id)->first());
        // dd($request);

        $request->validate([
            'user_owner_id' => 'required', 
            'motorcycle_type_id' => 'required', 
            'motorcycle_brand_id' => 'required', 
            'motorcycle_name' => 'required', 
            'production_year' => 'required', 
            'police_number' => 'required', 
            'motorcycle_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'vehicle_registration' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
            'status' => 'required',
        ]);

        // dd("test");

        $motorcycle_photo = null;
        $vehicle_registration = null;

        if($request->motorcycle_photo != null && $request->vehicle_registration ){
            $motorcycle_photo = $request->file('motorcycle_photo')->store('archives/'. $request->id, 'public');
            $vehicle_registration = $request->file('vehicle_registration')->store('archives/'. $request->id, 'public');
        }

        

        Motorcycle::where('id', $id)->update([
            'user_owner_id' => $request->user_owner_id, 
            'motorcycle_type_id' => $request->motorcycle_type_id, 
            'motorcycle_brand_id' => $request->motorcycle_brand_id, 
            'motorcycle_name' => $request->motorcycle_name, 
            'production_year' => $request->production_year, 
            'police_number' => $request->police_number, 
            'motorcycle_photo' => ($motorcycle_photo != null) ? $request->motorcycle_photo : $motorcycle_photo, 
            'vehicle_registration' => ($vehicle_registration != null) ? $request->vehicle_registration : $vehicle_registration, 
            'status' => $request->status,
        ]);
        
        return redirect('/operator/motorcycle')->with('success', "Data berhasil diubah");
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
        return redirect('/operator/motorcycle')->with('success', "Data berhasil dihapus");
    }
}
