<?php

namespace App\Http\Controllers;

use App\Actions\FilteredFollowedStreamsAction;
use App\Actions\GetFollowedStreamsAction;
use App\Http\Resources\FollowedStreamResource;
use App\Http\Resources\StreamRescource;
use App\Models\ActiveStream;
use App\Models\FollowedStreams;
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
            ActiveStream::orderBy('viewers_count', request()->input('sort_order') ?? 'desc')->paginate(100)
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
        $sqlDateFormat = "DATE_FORMAT(date_started, '%Y-%m-%d %H')";
        return StreamRescource::collection(ActiveStream::selectRaw(DB::raw("count($sqlDateFormat) AS date_count, $sqlDateFormat as start_date"))
            ->groupBy('start_date')
            ->orderBy('date_count', 'desc')
            ->get());
    }

    public function filteredFollowedStreams(): AnonymousResourceCollection
    {
        $user = Auth::user();

        return StreamRescource::collection(FilteredFollowedStreamsAction::run([
            'user' => $user
        ]));
    }

    public function followedStreams(): AnonymousResourceCollection
    {
        $user = Auth::user();
        $needViews = 0;
        $activeStreams = ActiveStream::topStreams()->pluck('viewers_count');
        $followedStreams = $user->followedStreams()->orderBy('viewers_count', 'desc')->get();
        $leastActiveStreamsCount = $activeStreams->last();
        $leastFollowedStreamsCount = $followedStreams->last()->viewers_count;
        //check viewers count needed to get into top 1k streams
        if ($followedStreams->count() && ($leastActiveStreamsCount > $leastFollowedStreamsCount)) {
            $needViews = ($leastActiveStreamsCount - $leastFollowedStreamsCount) + 1;
        }
        return StreamRescource::collection($followedStreams)
            ->additional([
                'needed_views_count' => $needViews
            ]);
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
