<?php

use Illuminate\Database\Seeder;

use App\Book;

class BookSeeder extends Seeder
{
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('books');

        $array = array();
        $file_handle = fopen(__DIR__.'/csv/books.csv','r');
        while(!feof($file_handle)){
            array_push($array, fgetcsv($file_handle, 1024));
        }
        fclose($file_handle);

        foreach ($array as $key => $arr){
            if($key != 0 && $arr != false) {
                $book = new Book();
                $book->title = $arr[0];
                $book->desc = $arr[1];
                $book->author = $arr[2];
                $book->category = $arr[3];
                $book->date= $arr[4];
                $book->added_by = $arr[5];
                $book->save();
            }
        }
    }
}
