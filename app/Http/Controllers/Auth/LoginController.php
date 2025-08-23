<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __construct(private AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(UserLoginRequest $request)
    {
        return $this->authRepository->login($request->validated());
    }

    public function usersData()
    {
        return $this->authRepository->userDetails();
    }
}
