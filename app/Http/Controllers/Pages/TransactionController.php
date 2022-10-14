<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\Transaction;
use App\Models\UserCustomer;
use App\Models\UserOwner;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $title = 'Transactions';
        $data = [];
        $tables = [];
        if(Auth::user()->role_id == 3){
            $data = UserCustomer::where('user_id', Auth::user()->id)->first();
            $tables = Transaction::with('motorcycle')->with('user_customer')->with('user_owner')
                            ->where('user_customer_id', $data->id)->get();
        }else{
            $data = UserOwner::where('user_id', Auth::user()->id)->first();
            $tables = Transaction::with('motorcycle')->with('user_customer')->with('user_owner')
                            ->where('user_owner_id', $data->id)->get();
        }
        
        return view('pages.transactions.index', compact([
            'title', 'tables'
        ]));
    }

    public function store(Request $request){
        $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();

        $start_at = new DateTime($request->start_at);
        $end_at = new DateTime($request->end_at);
        $days = $end_at->diff($start_at);

        $price = 75000;

        Transaction::create([
            'txid' => 'TX'.time(),
            'user_customer_id' => $customer->id,
            'user_owner_id' => $request->user_owner_id,
            'motorcycle_id' => $request->motorcycle_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'information' => $request->information,
            'total' => ($price * $days->d) + rand(100, 500)
        ]);

        Motorcycle::where('id', $request->motorcycle_id)->update([
            'status' => 'inactive'
        ]);

        return redirect('/v2/transaction')->with('success', "Successful booking!");
    }

    public function show($id){
        $title = 'Transactions';
        $tables = [];
        $data = [];
        if(Auth::user()->role_id == 3){
            $data = UserCustomer::where('user_id', Auth::user()->id)->first();
            $tables = Transaction::with('motorcycle')->with('user_customer')->with('user_owner')
                            ->where('user_customer_id', $data->id)
                            ->where('txid', $id)->first();
        }else{
            $data = UserOwner::where('user_id', Auth::user()->id)->first();
            $tables = Transaction::with('motorcycle')->with('user_customer')->with('user_owner')
                            ->where('user_owner_id', $data->id)
                            ->where('txid', $id)->first();
        }
        
        $start_at = new DateTime($tables->start_at);
        $end_at = new DateTime($tables->end_at);
        $days = $end_at->diff($start_at);
        return view('pages.transactions.show', compact([
            'title', 'tables', 'days'
        ]));
    }
}
