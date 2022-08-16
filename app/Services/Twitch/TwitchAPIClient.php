<?php

namespace App\Services\Twitch;

use App\Models\User;
use App\Services\BaseApiService;
use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;

class TwitchAPIClient extends BaseApiService
{
    public function __construct(protected string $accessToken)
    {
    }

    protected function baseUrl(): string
    {
        return env('TWITCH_API_DOMAIN');
    }


    protected function httpClient(): PendingRequest
    {
        return parent::httpClient()
            ->withHeaders([
                'Client-ID' => env('TWITCH_CLIENT_ID'),
                'Authorization' => 'Bearer ' . $this->accessToken
            ]);
    }

    /**
     * @return array
     * @throws RequestException
     */
    public function getUser(): array
    {
        return $this->httpClient()
            ->get('users')
            ->throw()
            ->json();
    }

    /**
     * @param User $user
     * @param string|null $cursor
     * @param int $limit
     * @return array
     * @throws RequestException
     */
    public function getStreams(User $user, ?string $cursor = null, int $limit = 100): array
    {
        $this->manageAccessToken($user);
        return $this->httpClient()
            ->get('streams', [
                'first' => $limit,
                'after' => $cursor
            ])
            ->throw()
            ->json();
    }

    /**
     * @param User $user
     */
    protected function manageAccessToken(User $user)
    {
        if (Carbon::now() > $user->twitch_token_expiration) {
            $authClient = resolve(TwitchOAuthClient::class);
            $response = $authClient->refreshAccessToken($user->twitch_refresh_token);
            $accessToken = data_get($response, 'access_token');
            $refreshToken = data_get($response, 'refresh_token');
            $expiration = data_get($response, 'expires_in');
            $userTokenData = [
                'twitch_access_token' => $accessToken,
                'twitch_refresh_token' => $refreshToken,
                'twitch_token_expiration' => Carbon::now()->addSeconds($expiration),
            ];
            $user->update($userTokenData);
            $this->accessToken= $accessToken;
        }
    }
}
