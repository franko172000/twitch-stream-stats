<?php
declare(strict_types=1);

namespace App\Actions;

use App\Models\ActiveStream;
use App\Models\Tags;
use App\Services\Twitch\TwitchAPIClient;
use Illuminate\Http\Client\RequestException;

class PullActiveStreamsAction extends Action
{
    protected TwitchAPIClient $APIClient;

    protected int $streamCounter = 0;

    public function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id']
        ];
    }

    /**
     * @throws RequestException
     */
    public function execute()
    {
        $this->APIClient = resolve(TwitchAPIClient::class, [
            'accessToken' => $this->user->twitch_access_token
        ]);

        $this->makeRequest();
    }

    /**
     * @param string|null $cursor
     * @throws RequestException
     */
    protected function makeRequest(?string $cursor = null)
    {
        $response = $this->APIClient->getStreams($this->user, $cursor);
        $streams = data_get($response, 'data');
        $responseCursor = data_get($response, 'pagination.cursor');
        $this->saveStreams($streams);
        $this->streamCounter+=count($streams);
        if (!empty($responseCursor) && $this->streamCounter <= 4000) {
            $this->makeRequest($responseCursor);
        }
    }

    /**
     * @param array $streams
     */
    protected function saveStreams(array $streams)
    {
        shuffle($streams);
        foreach ($streams as $stream) {
            $activeStreams = ActiveStream::updateOrCreate([
                'twitch_stream_id' => $stream['id']
            ], [
                'channel_name' => $stream['user_name'],
                'stream_title' => $stream['title'] ,
                'game_name' => $stream['game_name'],
                'viewers_count' => $stream['viewer_count'],
                'date_started' => $stream['started_at'],
                'thumbnail_url' => $stream['thumbnail_url']
            ]);

            $this->synTags($activeStreams, $stream['tag_ids']);
        }
    }

    protected function synTags(ActiveStream $activeStream, ?array $streamTags)
    {
        if (!empty($streamTags)) {
            $tags = Tags::whereIn('twitch_tag_id', $streamTags)->pluck('id');

            $activeStream->tags()->sync($tags->toArray());
        }
    }
}
