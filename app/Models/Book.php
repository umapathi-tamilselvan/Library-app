<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'category_id', 'total_copies', 'available_copies', 'image'];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function borrower()
    {
        return $this->hasMany(Borrower::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
