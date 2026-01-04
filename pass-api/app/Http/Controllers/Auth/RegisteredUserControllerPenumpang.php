<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Penumpang;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserControllerPenumpang extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nomor_telepon' => ['required', 'digits_between:10,14'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Penumpang::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Penumpang::create([
            'name' => $request->name,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'Akun yang anda telah disimpan / terdaftar.'
        ]);        
    }
}
