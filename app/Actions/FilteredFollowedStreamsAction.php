<?php
declare(strict_types=1);

namespace App\Actions;

use App\Models\ActiveStream;
use App\Services\Twitch\TwitchAPIClient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\RequestException;

class FilteredFollowedStreamsAction extends Action
{
    protected TwitchAPIClient $APIClient;

    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id']
        ];
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        $followedStreams = $this->user->followedStreams()->pluck('twitch_stream_id');
        $activeStreams = ActiveStream::topStreams()
            ->get();

        return $activeStreams->filter(function ($streams) use ($followedStreams) {
            return in_array($streams->twitch_stream_id, $followedStreams->toArray());
        });
    }
}
