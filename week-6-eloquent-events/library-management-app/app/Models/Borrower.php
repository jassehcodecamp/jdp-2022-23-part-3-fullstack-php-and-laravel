<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
