<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

interface AuthRepositoryInterface
{
    public function register(UserRegisterRequest $request);
    public function login(UserLoginRequest $request);
    public function logout();
}