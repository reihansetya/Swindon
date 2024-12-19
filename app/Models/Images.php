<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $table = 'images';

    // Primary key type is UUID
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id', 'album_id', 'single_id', 'image_path', 'type', 'created_at', 'updated_at'];

    public function album()
    {
        return $this->belongsTo(Albums::class, 'album_id', 'id');
    }

    public function Single()
    {
        return $this->belongsTo(Singles::class, 'single_id', 'id');
    }
}
