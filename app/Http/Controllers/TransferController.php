<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TransferController extends Controller
{
    public function create()
    {
        return view('transfer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_account' => 'required',
            'amount' => 'required|numeric|min:1',
            'pin' => 'required|digits:4',
        ]);

        $sender = Auth::user();

        // Check PIN
        if ($sender->pin != $request->pin) {
            return back()->withErrors(['pin' => 'Invalid PIN']);
        }

        // Check balance
        if ($sender->balance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient balance']);
        }

        // Find receiver
        $receiver = User::where('account_number', $request->receiver_account)->first();

        if (!$receiver) {
            return back()->withErrors(['receiver_account' => 'Receiver not found']);
        }

        // Prevent self transfer
        if ($receiver->id == $sender->id) {
            return back()->withErrors(['receiver_account' => 'You cannot transfer to yourself']);
        }

        // Perform transfer
        $sender->balance -= $request->amount;
        $receiver->balance += $request->amount;

        $sender->save();
        $receiver->save();

        return redirect()->route('dashboard')->with('success','Transfer successful');
    }
}



