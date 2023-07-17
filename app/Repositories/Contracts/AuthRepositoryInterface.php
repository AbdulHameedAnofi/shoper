<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function login(array $data);
    public function userDetails();
    public function logout();
}