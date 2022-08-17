<?php

namespace App\Http\Controllers;

use App\Http\Resources\StreamRescource;
use App\Models\ActiveStream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StreamsController extends Controller
{
    public function topStreams()
    {
        return StreamRescource::collection(ActiveStream::orderBy('viewers_count', 'desc')->paginate(100));
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
}
