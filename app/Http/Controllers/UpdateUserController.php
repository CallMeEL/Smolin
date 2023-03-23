<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UpdateUserController extends Controller
{
    public function edit()
    {
        return view('beranda.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'no_ktp' => 'required|numeric',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->no_ktp = $request->no_ktp;
        $user->save();

        return back()->with('success', 'Your profile has been updated!');
    }
}
