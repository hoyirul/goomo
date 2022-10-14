<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\MotorcycleBrand;
use App\Models\MotorcycleType;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $types = MotorcycleType::all();
        $brands = MotorcycleBrand::all();
        return view('pages.motorcycles.create', compact([
            'title', 'types', 'brands'
        ]));
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
            'motorcycle_type_id' => 'required',
            'motorcycle_brand_id' => 'required',
            'motorcycle_name' => 'required',
            'production_year' => 'required|max:4',
            'police_number' => 'required|string|max:20',
            'motorcycle_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vehicle_registration' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $owner = UserOwner::where('user_id', Auth::user()->id)->first();

        if($request->file('motorcycle_photo') && $request->file('vehicle_registration')){
            $motorcycle_photo = $request->file('motorcycle_photo')->store('motorcycle/'. $owner->id, 'public');
            $vehicle_registration = $request->file('vehicle_registration')->store('motorcycle/'. $owner->id, 'public');
        }


        Motorcycle::create([
            'user_owner_id' => $owner->id,
            'motorcycle_type_id' => $request->motorcycle_type_id,
            'motorcycle_brand_id' => $request->motorcycle_brand_id,
            'motorcycle_name' => $request->motorcycle_name,
            'production_year' => $request->production_year,
            'police_number' => $request->police_number,
            'motorcycle_photo' => $motorcycle_photo,
            'vehicle_registration' => $vehicle_registration,
            'description' => $request->description,
        ]);
        
        return redirect('/v2/motorcycle')->with('success', "Data berhasil ditambahkan");
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
        $owner = UserOwner::where('user_id', Auth::user()->id)->first();
        $title = 'Motorcycles';
        $types = MotorcycleType::all();
        $brands = MotorcycleBrand::all();
        $tables = Motorcycle::with('motorcycle_type')->with('motorcycle_brand')
                    ->where('user_owner_id', $owner->id)
                    ->where('id', $id)->first();
        return view('pages.motorcycles.edit', compact([
            'title', 'tables', 'types', 'brands'
        ]));
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
            'motorcycle_type_id' => 'required',
            'motorcycle_brand_id' => 'required',
            'motorcycle_name' => 'required',
            'production_year' => 'required|max:4',
            'police_number' => 'required|string|max:20',
        ]);
        
        // dd($request->all());

        $owner = UserOwner::where('user_id', Auth::user()->id)->first();

        
        // $motorcycle_photo = null;
        // $vehicle_registration = null;
        
        if($owner->motorcycle_photo && file_exists(storage_path('app/public/'. $owner->motorcycle_photo)) && $owner->vehicle_registration && file_exists(storage_path('app/public/'. $owner->vehicle_registration))){
            Storage::delete(['public/', $owner->motorcycle_photo]);
            Storage::delete(['public/', $owner->vehicle_registration]);
        }
        // dd(($motorcycle_photo == null) ? $request->mtr_photo : $motorcycle_photo);
        
        if($request->file('motorcycle_photo') && $request->file('vehicle_registration')){
            $motorcycle_photo = $request->file('motorcycle_photo')->store('motorcycle/'. $owner->id, 'public');
            $vehicle_registration = $request->file('vehicle_registration')->store('motorcycle/'. $owner->id, 'public');
        }
        // dd(($motorcycle_photo == null) ? $owner->motorcycle_photo : $motorcycle_photo);


        Motorcycle::where('id', $id)->update([
            'user_owner_id' => $owner->id,
            'motorcycle_type_id' => $request->motorcycle_type_id,
            'motorcycle_brand_id' => $request->motorcycle_brand_id,
            'motorcycle_name' => $request->motorcycle_name,
            'production_year' => $request->production_year,
            'police_number' => $request->police_number,
            'motorcycle_photo' => ($motorcycle_photo == null) ? $owner->vehicle_registration : $motorcycle_photo,
            'vehicle_registration' => ($vehicle_registration == null) ? $owner->vehicle_registration : $vehicle_registration,
            'description' => $request->description,
        ]);
        
        return redirect('/v2/motorcycle')->with('success', "Data berhasil diubah");
    }

    public function activated($id)
    {
        Motorcycle::where('id', $id)->update([
            'status' => 'active',
        ]);
        
        return redirect('/v2/motorcycle')->with('success', "Data berhasil diubah");
    }

    public function inactivated($id)
    {
        Motorcycle::where('id', $id)->update([
            'status' => 'inactive',
        ]);
        
        return redirect('/v2/motorcycle')->with('success', "Data berhasil diubah");
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
        return redirect('/v2/motorcycle')->with('success', "Data berhasil dihapus");
    }
}
