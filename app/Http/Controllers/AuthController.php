<?php

namespace App\Http\Controllers;

use App\Actions\AuthenticationAction;
use App\Http\Resources\AuthResource;
use App\Services\Twitch\TwitchOAuthClient;

class AuthController extends Controller
{
    public function __construct(protected TwitchOAuthClient $authClient)
    {
    }

    /**
     * @return AuthResource
     * @throws \Exception
     */
    public function loginWithTwitch(): AuthResource
    {
        $user = AuthenticationAction::run([
            'code' => request()->input('code')
        ]);

        $token = $user->createToken('access_token')->plainTextToken;

        return (new AuthResource($user))->additional([
            'access_token' => $token
        ]);
    }
}
