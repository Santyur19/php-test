<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'published',
        'pages',
        'description',
        'stock'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'authors_books')->withTimestamps();
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
