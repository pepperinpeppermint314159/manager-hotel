<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check()) return view('dashboard.index');
        return view('login.index');
    }

    public function login(Request $request){
        $username = $request->input('username');
        $user = User::query()->where('name', $username)->first();
        $password = $request->input('password');
        if (!$user) return redirect()->back();
        $checkLogin = Hash::check($password, $user->password);
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }

    public function register(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        User::create([
            'name' => 'hoanghung',
            'password' => bcrypt('hoanghung'),
            'email' => 'Hungh5614@gmail.com',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.index');
    }

}
