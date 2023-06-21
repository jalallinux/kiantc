<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\AuthenticatedRequest;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterRequest;
use App\Http\Resources\API\V1\Auth\MeResource;
use App\Http\Resources\API\V1\Auth\TokenResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    const REGISTER_TOKEN_NAME = 'Register';

    const LOGIN_TOKEN_NAME = 'Login';

    public function me(AuthenticatedRequest $request)
    {
        return new MeResource($request->user());
    }

    public function register(RegisterRequest $request)
    {
        /** @var User $user */
        $user = User::query()->create($request->validated());

        $token = $user->createToken(self::REGISTER_TOKEN_NAME);

        return new TokenResource($token);
    }

    public function login(LoginRequest $request)
    {
        /** @var User $user */
        $user = User::query()->firstWhere('mobile', $request->input('mobile'));

        throw_if(! Hash::check($request->input('password'), $user->getAttribute('password')), new AuthenticationException);

        $token = $user->createToken(self::LOGIN_TOKEN_NAME);

        return new TokenResource($token);
    }

    public function logout(AuthenticatedRequest $request)
    {
        $request->user()->token()->revoke();

        return response()->noContent();
    }
}
