<?php
declare(strict_types=1);

namespace App\Actions;

use App\Models\FollowedStreams;
use App\Models\Tags;
use App\Models\User;
use App\Services\Twitch\TwitchAPIClient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\RequestException;

class GetStreamTagsAction extends Action
{
    protected TwitchAPIClient $APIClient;

    public function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id']
        ];
    }

    /**
     * @return void
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
        $response = $this->APIClient->getTags($this->user, $cursor);
        $tags = data_get($response, 'data');
        $responseCursor = data_get($response, 'pagination.cursor');
        $this->saveTags($tags);
        if (!empty($responseCursor)) {
            $this->makeRequest($responseCursor);
        }
    }

    /**
     * @param array $tags
     */
    protected function saveTags(array $tags)
    {
        foreach ($tags as $tag) {
            Tags::updateOrCreate([
                'twitch_tag_id' => $tag['tag_id']
            ], [
                'tag' => $tag['localization_names']['en-us'],
                'description' => $tag['localization_descriptions']['en-us'],
            ]);
        }
    }
}
