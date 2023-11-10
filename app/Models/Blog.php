<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
    ];

    public function getDateCreatedAtAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

}
