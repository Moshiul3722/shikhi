<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required'
        ]);

        try {
            // If Email Or Password match
            if (! Auth::attempt($request->only('email', 'password'))) {
                return [
                    'error'     => false,
                    'message'   => 'Email Or Password does not match!'
                ];
            }

            /** @var User $user */
            $user = Auth()->user();
            // Token
            $token = $user->createToken('token')->plainTextToken;

            // Response
            return [
                'error'   => false,
                'message' => 'logged in successful',
                'token'   => $token,
                'user'    => $user,
            ];
        } catch (\Throwable $th) {
            // Response
            return [
                'error' => true,
                'message' => 'Something went wrong!'. $th->getMessage(),
            ];
        }
    }
}
