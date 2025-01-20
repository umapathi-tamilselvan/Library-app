<?php

namespace App\Models;

use App\Models\Library;
use App\Models\Borrower;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function borrower()
    {
        return $this->hasMany(Borrower::class);

    }
}
