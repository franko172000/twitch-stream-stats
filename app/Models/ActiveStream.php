<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpCsFixer\DocBlock\Tag;

class ActiveStream extends Model
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

    protected $with = ['tags'];

    protected $casts = [
        'date_started' => 'datetime',
        'viewers_count' => 'int'
    ];

    public function scopeTopStreams($query, $limit = 1000)
    {
        return $query->orderBy('viewers_count', 'desc')
            ->limit($limit);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'active_stream_tag', 'active_stream_id', 'tag_id');
    }
}
