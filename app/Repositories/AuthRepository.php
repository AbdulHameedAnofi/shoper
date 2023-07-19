<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $data)
    {
        if (User::where('email', $data['email'])->exists())
        {
            $user = User::where('email', $data['email'])->first();
            if (!Hash::check($data['password'], $user->password))
            {
                return [
                    'status' => false,
                    'message' => 'Incorrect Email or Password'
                ];
            }
            // return $user;
            return [
                'status' => true,
                'message' => 'User has been logged in',
                'data' => [
                    'token' => JWT::encode([$user->id], config('jwt.secret'), 'HS256')
                ],
            ];
        }
        return [
            'status' => false,
            'message' => 'Invalid e-mail address'
        ];
    }

    public function register(array $data)
    {
        // DB::beginTransaction();
        try {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            // DB::commit();
            return [
                'status' => true,
                'message' => 'User account created succesfully',
                'data' => [
                    'token' => JWT::encode([$user->id], config('jwt.key'), 'HS256')
                ],
            ];

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            // DB::rollBack();

            return [
                'status' => false,
                'message' => "Unable to create user account: ".$th->getMessage()
            ];
        }
                    
        return $user;


    }

    public function userDetails() 
    {
        return [
            'status' => true,
            'message' => 'Authenticated users details',
            'data' => [
                'user' => Auth::user()
            ]
        ];
    }

    public function logout()
    {
        Auth::logout();
        return [
            'status' => true,
            'message' => 'Succesfully Logged user out'
        ];
    }
}