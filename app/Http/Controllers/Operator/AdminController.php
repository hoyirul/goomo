<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserOperator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Operator';
        $tables = UserOperator::all();
        return view('operators.admins.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Operator';
        return view('operators.admins.create', compact('title'));
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

        UserOperator::create([
            'name' => $request->name
        ]);
        
        return redirect('/operator/admin')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Operator';
        $tables = UserOperator::where('id', $id)->first();
        return view('operators.admins.show', compact('title', 'tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Operator';
        $data = UserOperator::where('id', $id)->first();
        return view('operators.admins.edit', compact('title', 'data'));
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
        $tables = UserOperator::where('id', $id)->first();

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

        UserOperator::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'identity_photo' => ($identity_photo != null) ? $request->identity_photo : $identity_photo,
            'driver_license' => ($driver_license != null) ? $request->driver_license : $driver_license,
            'selfie_photo' => ($selfie_photo != null) ? $request->selfie_photo : $selfie_photo
        ]);
        
        return redirect('/operator/admin')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserOperator::where('id', $id)->delete();
        return redirect('/operator/admin')->with('success', "Data berhasil dihapus");
    }
}
