<?php

namespace App;



class Forum extends BaseModel
{
    protected $fillable = ['title', 'body'];

    public static function getInstance($data){
        return ( isset($data['id']) ) ? Forum::find($data['id']) : new Forum() ;
    }
}
