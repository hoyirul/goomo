<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\MotorcycleBrand;
use App\Models\MotorcycleType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Motorcycles';
        $types = MotorcycleType::all();
        $brands = MotorcycleBrand::all();
        $tables = Motorcycle::with('motorcycle_type')->with('motorcycle_brand')->with('user_owner')
                        ->where('status', 'active')->paginate(12);
        return view('pages.home.index', compact([
            'tables', 'title', 'brands', 'types'
        ]));
    }

    public function show($id){
        $title = 'Motorcycles Detail';
        $tables = Motorcycle::with('motorcycle_type')->with('motorcycle_brand')->with('user_owner')
                        ->where('status', 'active')
                        ->where('id', $id)
                        ->first();
        return view('pages.home.show', compact([
            'tables', 'title'
        ]));
    }
}
