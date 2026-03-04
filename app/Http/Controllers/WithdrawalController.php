<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;

class WithdrawalController extends Controller
{
    // Show withdrawal form
    public function create()
    {
        return view('withdraw'); // Make sure withdraw.blade.php exists
    }

    // Handle withdrawal
    public function store(Request $request)
    {
        $request->validate([
            'agent_number' => 'required',
            'amount' => 'required|numeric|min:1',
            'pin' => 'required|digits:4',
        ]);

        $user = Auth::user();
        $agent = User::where('account_number', $request->agent_number)
                     ->where('is_agent', true)
                     ->first();

        if (!$agent) {
            return back()->withErrors(['agent_number' => 'Agent not found']);
        }

        if ($user->pin != $request->pin) {
            return back()->withErrors(['pin' => 'Invalid PIN']);
        }

        if ($user->balance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient balance']);
        }

        // Calculate 10% fee
        $feePercent = 10;
        $fee = ($request->amount * $feePercent) / 100;

        // Split fee: 60% admin, 40% agent
        $adminShare = ($fee * 60) / 100;
        $agentShare = ($fee * 40) / 100;

        // Deduct total amount from user
        $user->balance -= $request->amount;
        $user->save();

        // Add agent share to agent account
        $agent->balance += $agentShare;
        $agent->save();

        // Record transaction
        Transaction::create([
            'user_id' => $user->id,
            'agent_id' => $agent->id,
            'type' => 'withdrawal',
            'amount' => $request->amount,
            'fee' => $fee,
            'admin_share' => $adminShare,
            'agent_share' => $agentShare,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')
                         ->with('success', "Withdrawal requested. User receives " . ($request->amount - $fee) . " SSp. Fee: $fee SSp (Admin: $adminShare, Agent: $agentShare)");
    }
}
