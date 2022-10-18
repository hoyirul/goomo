<?php

namespace App\Http\Controllers;

use App\Models\UserCustomer;
use App\Models\UserOperator;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function add()
    {
        $role = Auth::user()->role_id;
        $data = [
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->email,
            'phone' => null
        ];
        switch($role){
            case 1:
                UserOperator::create($data);
                break;
            case 2:
                UserOperator::create($data);
                break;
            case 3:
                UserCustomer::create($data);
                break;
            case 4:
                UserOwner::create($data);
                break;
        }
        
        return redirect()->to('/v2/dashboard');
    }
}
