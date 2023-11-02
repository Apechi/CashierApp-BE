<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {


        $validate = $request->validated();


        $validate['password'] = Hash::make($validate['password']);
        $user = User::create($validate);

        // Create user...
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['token' => $token], 200);
    }

    public function login(UpdateUserRequest $request)
    {
        $validate = $request->validated();

        if (auth()->attempt($validate)) {
            $token = auth()->user()->createToken('UID')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Akun Tidak di Temukan'], 401);
        }
    }

    public function userInfo()
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

    public function logout()
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
