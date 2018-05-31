<?php

use Illuminate\Database\Seeder;

use App\Circulation;

class CirculationSeeder extends Seeder
{
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('circulations');

        $file_handle = fopen(__DIR__.'/csv/circulations.csv','r');
        while(!feof($file_handle)){
            $array[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);

        foreach ($array as $key => $arr){
            if($key != 0 && $arr != false) {
                $circ = new Circulation();
                $circ->person_id = $arr[0];
                $circ->book_id = $arr[1];
                $circ->borrowed_at = $arr[2];
                $circ->return_by = $arr[3];
                $circ->returned_at = $arr[4];
                $circ->added_by = $arr[5];
                $circ->save();
            }
        }
    }
}
