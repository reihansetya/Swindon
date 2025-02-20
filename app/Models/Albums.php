<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    /** @use HasFactory<\Database\Factories\AlbumsFactory> */
    use HasFactory;

    protected $table = 'albums';

    // Primary key type is UUID
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id', 'slug', 'title', 'category_id', 'release_date', 'cover_url', 'spotify_url', 'description', 'produced_by', 'recorded_at', 'created_at', 'updated_at'];

    public function singles()
    {
        return $this->hasMany(Singles::class, 'album_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasOne(Images::class, 'album_id', 'id');
    }
}
