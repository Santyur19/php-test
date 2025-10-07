<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'biography',
        'nationality_id',
        'birth'
    ];

    protected $casts = [
        'birth' => 'date',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'authors_books')->withTimestamps();
    }
}
