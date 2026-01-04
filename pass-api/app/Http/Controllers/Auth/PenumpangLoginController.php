<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PenumpangLoginRequest;
use App\Models\Penumpang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PenumpangLoginController extends Controller
{
    public function store(PenumpangLoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $penumpang = Penumpang::where('email', $data['email'])->first();

        if (! $penumpang || ! Hash::check($data['password'], $penumpang->password)) {
            // format error validasi standar (422) untuk kredensial salah[web:238]
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah.'],
            ]);
        }

        // (opsional) hapus token lama jika mau “single session”
        // $penumpang->tokens()->delete();

        $token = $penumpang->createToken('main')->plainTextToken; // Sanctum[web:238]

        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
            'token' => $token,
            'data' => [
                'id' => $penumpang->id,
                'name' => $penumpang->name,
                'email' => $penumpang->email,
                'nomorTelepon' => $penumpang->nomor_telepon,
            ],
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        // logout token-based: hapus token yang sedang dipakai
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil',
        ]);
    }
}
