<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singles extends Model
{
    /** @use HasFactory<\Database\Factories\SinglesFactory> */
    use HasFactory;

    protected $table = 'singles';

    // Primary key type is UUID
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id', 'album_id', 'slug', 'title', 'release_date', 'genre', 'spotify_url', 'youtube_embed', 'description', 'produced_by', 'recorded_at', 'created_at', 'updated_at'];

    public function albums()
    {
        return $this->belongsTo(Albums::class, 'album_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function lyrics()
    {
        return $this->hasOne(Lyrics::class, 'single_id', 'id');
    }

    public function images()
    {
        return $this->hasOne(Images::class, 'single_id', 'id');
    }
}
