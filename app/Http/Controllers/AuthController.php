<?php

namespace App\Http\Controllers;

use App\Actions\AuthenticationAction;
use App\Actions\GetFollowedStreamsAction;
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

        //This is can be run in the background UserStreamsJob::class job
        // Running this synchronously because the test server does not have que worker available
        GetFollowedStreamsAction::run([
            'user' => $user,
        ]);

        $token = $user->createToken('access_token')->plainTextToken;

        return (new AuthResource($user))->additional([
            'access_token' => $token
        ]);
    }

    public function appLogout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'successfully logged out'
        ]);
    }
}
