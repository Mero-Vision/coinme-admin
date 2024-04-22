<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {

        $credential = $request->only('email', 'password');
        try {
            if (Auth::attempt($credential)) {
                $user = Auth::user();
                if ($user->status == 'admin' || $user->status == 'super-admin') {
                    sweetalert()->addSuccess('Welcome ' . $user->name);
                    return redirect('admin/dashboard');
                } else {
                    sweetalert()->addWarning('You are not an admin!');

                    return back();
                }
            } else {
                sweetalert()->addWarning('Invalid email or password. Please ensure 
                that you have entered the correct credentials.');

                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            auth()->logout();

            sweetalert()->addSuccess('Logout Successfully!');
            return redirect('/');
        } else {
            sweetalert()->addWarning('User is not authenticated!');
            return redirect('/');
        }
    }
}