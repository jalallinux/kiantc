<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseWithCreateToken(User $user, string $tokenName)
    {
        $token = $user->createToken($tokenName);

        return response()->json([
            'user' => $user->jsonSerialize(),
            'token' => [
                'name' => $token->token->getAttribute('name'),
                'expired_at' => Carbon::createFromFormat('Y-m-d H:i:s', $token->token->getAttribute('expires_at'))->timestamp,
                'accessToken' => $token->accessToken,
            ],
        ]);
    }
}
