<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\UserCustomer;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $title = 'Payments';
        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();
        $tables = Payment::with('transaction')->with('user_customer')
                        ->where('user_customer_id', $customer->id)->get();
        return view('pages.payments.index', compact([
            'title', 'tables'
        ]));
    }

    public function create($id){
        $title = 'Payments';
        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();
        $tables = Transaction::with('motorcycle')->with('user_customer')
                        ->where('user_customer_id', $customer->id)
                        ->where('txid', $id)->first();
        $start_at = new DateTime($tables->start_at);
        $end_at = new DateTime($tables->end_at);
        $days = $end_at->diff($start_at);
        return view('pages.payments.create', compact([
            'title', 'tables', 'days'
        ]));
    }

    public function store(Request $request){
        $request->validate([
            'pay' => 'required|same:total',
            'evidence_of_transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();

        if($request->file('evidence_of_transfer')){
            $evidence_of_transfer = $request->file('evidence_of_transfer')->store('invoice/'. $customer->id, 'public');
        }

        Payment::create([
            'user_operator_id' => NULL,
            'user_customer_id' => $customer->id,
            'txid' => $request->txid,
            'invoice' => 'INV-'.time(),
            'evidence_of_transfer' => $evidence_of_transfer,
            'paid_date' => Carbon::now(),
            'pay' => $request->pay,
            'status' => 'processing',
        ]);

        Transaction::where('txid', $request->txid)->update([
            'status' => 'processing'
        ]);
        
        return redirect('/v2/payment')->with('success', "Your payment is being processed!");
    }

    public static function pay_badge(){
        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();
        $count = Payment::where('user_customer_id', $customer->id)->where('status', '!=', 'paid')->count();

        return $count;
    }
}
