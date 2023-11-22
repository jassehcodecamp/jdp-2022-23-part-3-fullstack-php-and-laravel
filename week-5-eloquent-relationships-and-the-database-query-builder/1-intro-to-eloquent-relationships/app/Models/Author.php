<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::saved(function (Author $author) {
            logger('Author created', [$author]);
        });

        static::saving(function (Author $author) {
            $author->user_id = request()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
