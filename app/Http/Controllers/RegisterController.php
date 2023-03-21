<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        $request->session()->flash('success', 'Registration successfull! Please login');
        return redirect('/login');
    }

}
