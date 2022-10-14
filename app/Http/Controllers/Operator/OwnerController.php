<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOwner;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Owner';
        $tables = UserOwner::all();
        return view('operators.owners.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Owner';
        return view('operators.owners.create', compact('title'));
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

        UserOwner::create([
            'name' => $request->name
        ]);
        
        return redirect('/operator/owner')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Owner';
        $tables = UserOwner::where('id', $id)->first();
        return view('operators.owners.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Owner';
        $data = UserOwner::where('id', $id)->first();
        return view('operators.owners.edit', compact('title', 'data'));
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
        $tables = UserOwner::where('id', $id)->first();

        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required',
            'gender' => 'required',
            'identity_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'driver_license' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'selfie_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = null;
        $identity_photo = null;
        $driver_license = null;
        $selfie_photo = null;

        if($tables->image && file_exists(storage_path('app/public/'. $tables->cover_image))){
            Storage::delete(['public/', $tables->cover_image]);
        }

        if($request->image != null && $request->identity_photo && $request->driver_license && $request->selfie_photo){
            $image = $request->file('image')->store('profile/'. $request->id, 'public');
            $identity_photo = $request->file('identity_photo')->store('archives/'. $request->id, 'public');
            $driver_license = $request->file('driver_license')->store('archives/'. $request->id, 'public');
            $selfie_photo = $request->file('selfie_photo')->store('archives/'. $request->id, 'public');
        }

        UserOwner::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'identity_photo' => ($identity_photo != null) ? $request->identity_photo : $identity_photo,
            'driver_license' => ($driver_license != null) ? $request->driver_license : $driver_license,
            'selfie_photo' => ($selfie_photo != null) ? $request->selfie_photo : $selfie_photo
        ]);
        
        return redirect('/operator/owner')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserOwner::where('id', $id)->delete();
        return redirect('/operator/owner')->with('success', "Data berhasil dihapus");
    }
}
