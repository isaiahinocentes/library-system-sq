<?php

namespace App;

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
        "user_id"
    ];

    public static function getInstance($data){
        return ( isset($data['id']) ) ? Book::find($data['id']) : new Book() ;
    }

    //Relationships
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Circulation(){
        return $this->belongsTo('App\Circulation');
    }
    public function Circulations(){
        return $this->hasOne('App\Circulation');
    }
    public function Reservation(){
        return $this->belongsTo('App\Reservation');
    }
}
