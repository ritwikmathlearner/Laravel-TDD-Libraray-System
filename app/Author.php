<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name', 'second_name', 'birth_year'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
