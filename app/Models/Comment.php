<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',   // ID of the related book
        'user_id',   // ID of the user leaving the comment
        'content',   // The actual comment text
    ];


    public function book()
{
    return $this->belongsTo(Book::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}



