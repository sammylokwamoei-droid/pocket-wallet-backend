<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show profile page
    public function show()
    {
        return view('profile');
    }

    // Update 4-digit PIN
    public function updatePin(Request $request)
    {
        $request->validate([
            'current_pin' => 'required|digits:4',
            'new_pin' => 'required|digits:4|different:current_pin',
            'confirm_pin' => 'required|same:new_pin',
        ]);

        $user = Auth::user();

        if ($request->current_pin != $user->pin) {
            return back()->withErrors(['current_pin' => 'Current PIN is incorrect.']);
        }

        $user->pin = $request->new_pin;
        $user->save();

        return back()->with('success', 'PIN updated successfully!');
    }
}
