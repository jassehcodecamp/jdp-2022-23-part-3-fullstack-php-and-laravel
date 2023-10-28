<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use BelongsToUser;
    use HasFactory;

    protected $table = "book_borrower";

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }
}
