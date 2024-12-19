<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model
{
    /** @use HasFactory<\Database\Factories\LyricsFactory> */
    use HasFactory;

    protected $table = 'lyrics';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['lyrics_text', 'album_id', 'single_id', 'slug'];

    public function single()
    {
        return $this->belongsTo(Singles::class, 'single_id', 'id');
    }
}
