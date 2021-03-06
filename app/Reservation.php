<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'borrower_name',
        'borrower_id',
        'book_id', //Foreign
        'reservation_date',
        'reservation_expiration'
    ];

    public static function validate($data){
        if(!array_key_exists('reservation_date', $data)){
            $data = array_add($data, 'reservation_date', Carbon::now());
            $data = array_add($data, 'reservation_expiration', Carbon::tomorrow());
        }
        return $data;
    }


    public static function getCurrentTimestamp(){
        return Carbon::now();
    }

    public static function getInstance($data){
        return ( isset($data['id']) ) ?
            Reservation::find($data['id']) :
            new Reservation() ;
    }

    public function Book(){
        return $this->hasOne('App\Book', 'id', 'book_id');
    }

}
