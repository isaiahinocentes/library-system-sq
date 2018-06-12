<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Forum;

class ForumSeeder extends Seeder
{
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('forums');

        $array = array();
        $file_handle = fopen(__DIR__.'/csv/forums.csv','r');
        while(!feof($file_handle)){
            array_push($array, fgetcsv($file_handle, 1024));
        }
        fclose($file_handle);

        foreach ($array as $key => $arr){
            if($key != 0 && $arr != false) {
                $forum = new Forum();
                $forum->body = $arr[0];
                $forum->title = $arr[1];
                $forum->save();
            }
        }
    }

}
