<?php

namespace App\Models;

use App\Listeners\BookSaved;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use BelongsToUser;
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = ['name', 'description', 'category_id', 'author_id'];

    protected $guarded = [];

    // protected $dispatchesEvents = [
    //    'created' => BookSaved::class,
    // ];

    protected static function booted(): void
    {
        static::created(function (Book $book) {

            if (request()->file('image')) {
                $imagePath = request()->file('image')->store('books', 'public');
                $book->image = $imagePath;
                $book->save();
            }

        });
    }


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function borrowers()
    {
        return $this->belongsToMany(Borrower::class);
    }

    public function requests()
    {
        return $this->hasMany(BookRequest::class);
    }
}
