<?php
declare(strict_types=1);

namespace App\Actions;

use App\Models\FollowedStreams;
use App\Models\User;
use App\Services\Twitch\TwitchAPIClient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\RequestException;

class GetFollowedStreamsAction extends Action
{
    protected TwitchAPIClient $APIClient;

    public function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id']
        ];
    }

    /**
     * @return Collection
     * @throws RequestException
     */
    public function execute(): Collection
    {
        $this->APIClient = resolve(TwitchAPIClient::class, [
            'accessToken' => $this->user->twitch_access_token
        ]);

        $response = $this->APIClient->getFollowedStreams($this->user);

        $streams = data_get($response, 'data');

        $this->saveStreams($streams);

        return $this->user->followedStreams;
    }

    /**
     * @param array $streams
     */
    protected function saveStreams(array $streams)
    {
        foreach ($streams as $stream) {
            $this->user->followedStreams()->updateOrCreate([
                'twitch_stream_id' => $stream['id']
            ], [
                'channel_name' => $stream['user_name'],
                'stream_title' => $stream['title'] ,
                'game_name' => $stream['game_name'],
                'viewers_count' => $stream['viewer_count'],
                'date_started' => $stream['started_at'],
                'thumbnail_url' => $stream['thumbnail_url']
            ]);
        }
    }
}
