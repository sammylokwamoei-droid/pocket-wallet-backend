<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;

class AdminController extends Controller
{
    public function users() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deposits() {
        $deposits = Deposit::all();
        return view('admin.deposits', compact('deposits'));
    }

    public function withdrawals() {
        $withdrawals = Withdrawal::all();
        return view('admin.withdrawals', compact('withdrawals'));
    }
}


