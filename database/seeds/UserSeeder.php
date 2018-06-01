<?php

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 6/1/2018
 * Time: 9:03 AM
 */

class UserSeeder
{
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users');

        $array = array();
        $file_handle = fopen(__DIR__.'/csv/users.csv','r');
        while(!feof($file_handle)){
            array_push($array, fgetcsv($file_handle, 1024));
        }
        fclose($file_handle);

        foreach ($array as $key => $arr){
            if($key != 0 && $arr != false) {
                $user = new \App\User();
                $user->name = $arr[0];
                $user->email = $arr[1];
                $user->password = bcrypt($arr[2]);
                $user->save();
            }
        }
    }
}
