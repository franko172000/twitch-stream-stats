<?php

namespace App\Http\Controllers;

use App\Actions\FilteredFollowedStreamsAction;
use App\Actions\GetFollowedStreamsAction;
use App\Http\Resources\FollowedStreamResource;
use App\Http\Resources\StreamRescource;
use App\Models\ActiveStream;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StreamsController extends Controller
{
    public function topStreams()
    {
        $streamsViews = ActiveStream::pluck('viewers_count');
        return StreamRescource::collection(
            ActiveStream::orderBy('viewers_count', 'desc')->paginate(100)
        )->additional([
            'median_views' => $streamsViews->median()
        ]);
    }

    public function topGames()
    {
        return StreamRescource::collection(ActiveStream::select('viewers_count', 'game_name', 'id')
            ->orderBy('viewers_count', 'desc')
            ->paginate(10));
    }

    public function streamsPerGame()
    {
        return StreamRescource::collection(ActiveStream::selectRaw(DB::raw('count(game_name) AS game_count, game_name'))
            ->groupBy('game_name')
            ->orderBy('game_count', 'desc')
            ->paginate(10));
    }

    public function streamsByStartTime()
    {
        return StreamRescource::collection(ActiveStream::selectRaw(DB::raw('count(date_started) AS date_count'))
            ->groupBy('date_started')
            ->orderByRaw('ABS(UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date_started))')
            ->paginate(10));
    }

    public function followedStreams(): AnonymousResourceCollection
    {
        $user = Auth::user();
        return StreamRescource::collection(FilteredFollowedStreamsAction::run([
            'user' => $user
        ]));
    }

    public function syncFollowedStreams(): AnonymousResourceCollection
    {
        $user = Auth::user();
        $followedStreams = GetFollowedStreamsAction::run([
            'user' => $user
        ]);
        return FollowedStreamResource::collection($followedStreams);
    }
}
