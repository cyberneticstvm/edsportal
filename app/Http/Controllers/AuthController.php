<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function loginPage()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            $remember = $request->has('remember');
            if (Auth::attempt($credentials, $remember)):
                return redirect()->route('index')->with("success", "User logged in successfully");
            else:
                return redirect()->back()->with("error", "The provided credentials do not match with our records.")->withInput($request->all());
            endif;
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
    }

    function index()
    {
        return view("index");
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with("success", "User logged out successfully");
    }

    function forceLogout()
    {
        return view("admin.misc.force_logout");
    }

    function forceLogoutAll(Request $request)
    {
        $credentials = $request->validate([
            'password' => 'required|current-password',
        ]);
        try {
            Auth::logoutOtherDevices($request->password);
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
        return redirect()->route('index')->with("success", "User logged out from all devices successfully!");
    }
}
