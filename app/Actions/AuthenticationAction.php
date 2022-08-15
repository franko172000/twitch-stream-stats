<?php

namespace App\Actions;

use App\Models\User;
use App\Services\Twitch\TwitchAPIClient;
use App\Services\Twitch\TwitchOAuthClient;
use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;

class AuthenticationAction extends Action
{

    public function __construct(protected TwitchOAuthClient $authClient)
    {
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string']
        ];
    }

    /**
     * @return User
     * @throws RequestException
     */
    public function execute(): User
    {
        $response = $this->authClient->getAccessToken($this->code);
        $accessToken = data_get($response, 'access_token');
        $refreshToken = data_get($response, 'refresh_token');
        $expiration = data_get($response, 'expires_in');
        $twitchUser = (new TwitchAPIClient($accessToken))->getUser()['data'][0];
        $user = User::where('twitch_user_id', $twitchUser['id'])->first();
        $userTokenData = [
            'twitch_access_token' => $accessToken,
            'twitch_refresh_token' => $refreshToken,
            'twitch_token_expiration' => Carbon::now()->addSeconds($expiration),
        ];
        if ($user) {
            $user->update($userTokenData);
        } else {
            $user = User::create(array_merge(
                [
                    'name' => $twitchUser['display_name'],
                    'email' => $twitchUser['email'],
                    'profile_image' => $twitchUser['profile_image_url'],
                    'twitch_user_id' => $twitchUser['id']
                ],
                $userTokenData
            ));
        }
        return $user;
    }
}
