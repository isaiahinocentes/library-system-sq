<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function saveData($data){
        try {

            $query = static::getInstance($data);

            $ctr = 0;

            foreach ($query->fillable as $column){
                if($column == "password"){
                    $query[$column] = bcrypt($data[$ctr]);
                } else {
                    if($data[$ctr] === ""){
                        echo $column." => NULL <br/>";
                        $query[$column] = null;
                    } else {
                        echo $column." => ".$data[$ctr]."<br/>";
                        $query[$column] = $data[$ctr];
                    }
                }
                $ctr++;
            }

            echo "<hr/>";

            $query->save();

            if($query->save()){

                return array(
                    'id'        => $query->id,
                    'status'    => 'success',
                    'messages'  => 'Saved Successfully!',
                    'code'      => 200
                );

            }else{

                return array(
                    'id'        => 0,
                    'status'    => 'error',
                    't'         => 'An Error has occured!',
                    'messages'  => 'Please contact iOrthotic support. 1',
                    'code'      => 400
                );

            }

        } catch (\Exception $e){

            return ( array(
                'id'        => 0,
                'status'    => 'error',
                't'         => 'An Error has occured!',
                'messages'=> $e->getMessage(),
                'code'      => 400
            ));
        }
    }

    public static function editData($data){

        try {

            $query = static::getInstance($data);
            echo json_encode($data)."<br/>";

            if($query->primaryKey == 'id'){
                $ctr = 0;
                foreach ($query->fillable as $column){
                    if($data[$ctr] === ""){
                        continue;
                    } else {
                        echo $column." => ".$data[$ctr]."<br/>";
                        $query[$column] = $data[$ctr];
                    }
                    $ctr++;
                }

            } else {

                for ($ctr = 0, $i = 1; $ctr < sizeof($data) and $i < sizeof($query->fillable); $ctr++, $i++){
                    echo $i." ".$query->fillable[$i]." => ".$data[$ctr]."<br/>";
                    $query[$query->fillable[$i]] = $data[$ctr];
                }
            }

            $query->save();

            if($query->save()){

                return array(
                    'id'        => $query->id,
                    'status'    => 'success',
                    'messages'  => 'Saved Successfully!',
                    'code'      => 200
                );

            }else{

                return array(
                    'id'        => 0,
                    'status'    => 'error',
                    't'         => 'An Error has occured!',
                    'messages'  => 'Please contact iOrthotic support. 1',
                    'code'      => 400
                );

            }

        } catch (\Exception $e){

            return ( array(
                'id'        => 0,
                'status'    => 'error',
                't'         => 'An Error has occured!',
                'messages'=> $e->getMessage(),
                'code'      => 400
            ));
        }
    }
}
