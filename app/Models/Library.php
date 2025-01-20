<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
