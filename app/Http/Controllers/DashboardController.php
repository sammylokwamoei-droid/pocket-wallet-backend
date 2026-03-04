<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)
                                    ->latest()
                                    ->take(10)
                                    ->get();
        return view('dashboard', compact('transactions'));
    }
}
