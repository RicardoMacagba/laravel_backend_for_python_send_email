<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChangedPassword;

class ChangePasswordController extends Controller
{
    public function showForm()
    {
        return view('change-password'); // Blade file
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Store the new password as plain text
        ChangedPassword::create([
            'password' => $request->new_password
        ]);

        // Redirect to a confirmation page
        return redirect()->route('password-changed');
    }

    
}
