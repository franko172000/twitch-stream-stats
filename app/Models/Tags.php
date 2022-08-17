<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'twitch_tag_id',
        'tag'
    ];

    public function streams()
    {
        return $this->belongsToMany(ActiveStream::class, 'active_stream_tag', 'active_stream_id', 'tag_id');
    }
}
