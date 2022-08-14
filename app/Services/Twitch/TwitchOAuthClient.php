<?php

namespace App\Services\Twitch;

use App\Services\BaseApiService;
use Illuminate\Http\Client\RequestException;

class TwitchOAuthClient extends BaseApiService
{

    protected function baseUrl(): string
    {
        return env('TWITCH_ID_DOMAIN');
    }

    /**
     * @param string $code
     * @return array
     * @throws RequestException
     */
    public function getAccessToken(string $code): array
    {
        return $this->httpClient()
            ->post('oauth2/token', [
                'client_id' => env('TWITCH_CLIENT_ID'),
                'client_secret' => env('TWITCH_CLIENT_SECRET'),
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => env('VITE_TWITCH_REDIRECT_URL')
            ])
            ->throw()
            ->json();
    }

    /**
     * @param string $refreshToken
     * @return array
     * @throws RequestException
     */
    public function refreshAccessToken(string $refreshToken): array
    {
        return $this->httpClient()
            ->post('oauth2/token', [
                'client_id' => env('TWITCH_CLIENT_ID'),
                'client_secret' => env('TWITCH_CLIENT_SECRET'),
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken
            ])
            ->throw()
            ->json();
    }
}
