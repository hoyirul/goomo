<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCustomer;
use App\Models\UserOperator;
use App\Models\UserOwner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/v2/change_password')->with('success', 'Password successfully changed');
    }

    public function update_profile(Request $request){
        // ddd($request->all());
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

        $user = [];

        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
            $user = UserOperator::where('user_id', Auth::user()->id)->first();
        }else if(Auth::user()->role_id == 3){
            $user = UserCustomer::where('user_id', Auth::user()->id)->first();
        }else{
            $user = UserOwner::where('user_id', Auth::user()->id)->first();
        }

        // dd($request->all());

        if(Auth::user()->image && file_exists(storage_path('app/public/'. Auth::user()->image))){
            Storage::delete(['public/', Auth::user()->image]);
        }
        
        if($request->image != null && $request->identity_photo && $request->driver_license && $request->selfie_photo){
            $image = $request->file('image')->store('profile/'. $user->id, 'public');
            $identity_photo = $request->file('identity_photo')->store('archives/'. $user->id, 'public');
            $driver_license = $request->file('driver_license')->store('archives/'. $user->id, 'public');
            $selfie_photo = $request->file('selfie_photo')->store('archives/'. $user->id, 'public');
        }

        User::where('id', Auth::user()->id)
            ->update([
                'image' => ($image == null) ? Auth::user()->image : $image
            ]);
        
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
            UserOperator::where('user_id', Auth::user()->id)
                ->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'identity_photo' => $identity_photo,
                    'driver_license' => $driver_license,
                    'selfie_photo' => $selfie_photo,
                ]);
        }else if(Auth::user()->role_id == 2){
            UserCustomer::where('user_id', Auth::user()->id)
                ->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'identity_photo' => ($identity_photo == null) ? $user->identity_photo : $identity_photo,
                    'driver_license' => ($driver_license == null) ? $user->driver_license : $driver_license,
                    'selfie_photo' => ($selfie_photo == null) ? $user->selfie_photo : $selfie_photo,
                ]);
        }else{
            UserOwner::where('user_id', Auth::user()->id)
                ->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'identity_photo' => ($identity_photo == null) ? $user->identity_photo : $identity_photo,
                    'driver_license' => ($driver_license == null) ? $user->driver_license : $driver_license,
                    'selfie_photo' => ($selfie_photo == null) ? $user->selfie_photo : $selfie_photo,
                ]);
        }
        return redirect()->back()
                    ->with('success', 'Profile successfully changed at '. Carbon::now());
    }
}
