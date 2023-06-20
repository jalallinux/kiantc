<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::query()->create($request->validated());

        return $this->responseWithCreateToken($user, 'Register Token');
    }

    public function login(LoginRequest $request)
    {
        $user = User::query()->firstWhere('mobile', $request->input('mobile'));

        throw_if(! auth()->attempt($request->validated()), new AuthenticationException);

        return $this->responseWithCreateToken($user, 'Register Token');
    }
}
