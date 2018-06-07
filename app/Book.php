<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends BaseModel
{
    use SoftDeletes;
    //
    protected $fillable = [
        "title",
        "desc",
        "author",
        "category",
        "date",
        "added_by"
    ];

    public static function getInstance($data){
        return ( isset($data['id']) ) ? Book::find($data['id']) : new Book() ;
    }
}
