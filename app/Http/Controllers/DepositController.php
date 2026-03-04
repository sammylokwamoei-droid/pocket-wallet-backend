<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DepositController extends Controller
{
    public function create()
    {
        return view('deposit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_number' => 'required',
            'amount' => 'required|numeric|min:1',
            'pin' => 'required|digits:4',
        ]);

        $user = Auth::user();
        if($request->pin != $user->pin){
            return back()->withErrors(['pin' => 'Incorrect PIN']);
        }

        $code = rand(100000, 999999);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'amount' => $request->amount,
            'status' => 'pending',
            'verification_code' => $code,
        ]);

        return view('deposit_confirm', ['transaction' => $transaction]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required',
            'verification_code' => 'required|digits:6',
        ]);

        $transaction = Transaction::findOrFail($request->transaction_id);

        if($transaction->verification_code != $request->verification_code){
            return back()->withErrors(['verification_code' => 'Incorrect verification code']);
        }

        $transaction->status = 'completed';
        $transaction->save();

        $user = Auth::user();
        $user->balance += $transaction->amount;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Deposit successful!');
    }
}
