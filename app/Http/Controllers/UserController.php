<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public static function registerPage()
    {
        return view('page.register');
    }

    public static function handleRegister(Request $request)
    {
        // dd($request);
        $request->validate([
            'full_name'  => 'required|min:5',
            'gender' => 'required',
            'address' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password_confirmation' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'agreement' => 'accepted',
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->gender = $request->gender;
        $user->role = 'member';
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();

        return redirect()->route('login');
    }

    public static function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'accepted',
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            // Check Remember me
            if ($request->remember) {
                // Disimpan selama 300 menit / 5 JAM
                Cookie::queue('email', $request->email, 300);
            }
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login Successfully');
        } else {
            return redirect()->route('register')->with('failed', 'Your email or pass is invalid, Please register first');
        }
    }

    public static function handleLogout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Your Logout is Successfully');
    }
}
