<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myProfile()
    {
        try {
            $user = User::find(auth()->id());
            return[
                'error' => false,
                'data'  => new UserResource($user)
            ];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
