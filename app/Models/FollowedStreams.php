<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FollowedStreams extends Model
{
    use HasFactory;

    protected $fillable = [
        'twitch_stream_id',
        'channel_name',
        'stream_title',
        'game_name',
        'viewers_count',
        'date_started',
        'thumbnail_url',
    ];

    protected $casts = [
        'date_started' => 'datetime',
        'viewers_count' => 'int'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
