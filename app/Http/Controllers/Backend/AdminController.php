<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_loginform()
    {
        return view('backend.admin.admin_loging');
    }

    public function admin_loginlog(Request $request)
    {
        // Validate login form inputs
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in the admin using the 'admin' guard
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }else {
            Session::flash('error-msg', 'Invalid Email or Password');
            return redirect()->back();
        }

    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout(); // Logs out the admin
        Session::flush(); // Clears all session data (optional)
        return redirect()->route('admin.login'); // Redirect to the admin login page
    }
}
