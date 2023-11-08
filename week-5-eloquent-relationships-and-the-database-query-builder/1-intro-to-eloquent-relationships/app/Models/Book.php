<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use BelongsToUser;
    use HasFactory;

    // protected $fillable = ['name', 'description', 'category_id', 'author_id'];

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function borrowers()
    {
        return $this->belongsToMany(Borrower::class);
    }
}
