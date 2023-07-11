<?php

namespace App\Repositories;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(UserLoginRequest $request)
    {
        if (User::where('email', $request->email)->exists())
        {
            $user = User::where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password))
            {
                
            }
        }
    }

    public function register(UserRegisterRequest $request)
    {
        DB::beginTransaction();
        try {

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::commit();            

            return [
                'sucess' => true,
                'message' => 'User logged in succesfully',
                'data' => [
                    'token' => JWT::encode($user->uuid, 'HS512', config('jwt.key'))
                ],
            ];


        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'User Registration failed'
            ];
        }


    }

    public function logout()
    {
        
    }
}