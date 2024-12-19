<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name'];

    public function albums()
    {
        return $this->hasMany(Albums::class, 'category_id', 'id');
    }

    public function singles()
    {
        return $this->hasMany(Singles::class, 'category_id', 'id');
    }
}
