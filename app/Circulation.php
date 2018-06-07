<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circulation extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'person_id',
        'book_id',
        'borrowed_at',
        'return_by',
        'returned_at',
        'added_by'
    ];

    public static function getInstance($data){
        return ( isset($data['id']) ) ? Circulation::find($data['id']) : new Circulation() ;
    }
}
