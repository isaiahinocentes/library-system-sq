<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    protected $fillable = [
        "title",
        "desc",
        "author",
        "category",
        "date",
        "added_by"
    ];
}
