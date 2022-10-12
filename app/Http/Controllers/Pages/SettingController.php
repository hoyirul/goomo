<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCustomer;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function change_password(){
        $title = 'Change Password';
        $data = '';
        if(Auth::user()->role_id == 3){
            $data = UserCustomer::with('user')->where('user_id', Auth::user()->id)->first();
        }else{
            $data = UserOwner::with('user')->where('user_id', Auth::user()->id)->first();
        }
        return view('pages.settings.change_password', compact([
            'title', 'data'
        ]));
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/user/change_password')->with('success', 'Password successfully changed');
    }

    // public function update_profile(Request $request){
    //     // ddd($request->all());
    //     $request->validate([
    //         'name' => 'required|string|max:50',
    //         'phone_number' => 'required',
    //         'gender' => 'required',
    //         'address' => 'required|string',
    //         'zip_code' => 'required|string|max:10',
    //         'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);

    //     $image_name = null;
    //     if(auth()->user()->photo_profile && file_exists(storage_path('app/public/'. auth()->user()->photo_profile))){
    //         Storage::delete(['public/', auth()->user()->photo_profile]);
    //     }
        
    //     if($request->photo_profile != null){
    //         $image_name = $request->file('photo_profile')->store('profile', 'public');
    //     }

    //     User::where('id', auth()->user()->id)
    //         ->update([
    //             'photo_profile' => ($image_name == null) ? auth()->user()->photo_profile : $image_name
    //         ]);
        
    //     Customer::where('user_id', auth()->user()->id)
    //         ->update([
    //             'name' => $request->name,
    //             'phone_number' => $request->phone_number,
    //             'gender' => $request->gender,
    //             'address' => $request->address,
    //             'zip_code' => $request->zip_code,
    //         ]);
        
    //     return redirect()->back()
    //                      ->with('success', 'Profile successfully changed at '. Carbon::now());
    // }
}
