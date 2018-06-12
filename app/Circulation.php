<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circulation extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'person_id',
        'book_id', //Foreign
        'borrowed_at',
        'return_by',
        'returned_at',
        'user_id' //Foreign
    ];

    public static function getInstance($data){
        return ( isset($data['id']) ) ? Circulation::find($data['id']) : new Circulation() ;
    }

    //Relationships
    public function Book(){
        return $this->belongsTo('App\Book');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
}
