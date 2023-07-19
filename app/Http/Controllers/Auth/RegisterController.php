<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function __construct(private AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function create(UserRegisterRequest $request)
    {
        return $this->authRepository->register($request->validated());
        return response()->json([
            "data" => $data
        ]);
    }
}
