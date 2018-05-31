<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 5/31/2018
 * Time: 10:15 PM
 */

use App\Invoice;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('invoices');

        $array = array();
        $file_handle = fopen(__DIR__.'/csv/books.csv','r');
        while(!feof($file_handle)){
            array_push($array, fgetcsv($file_handle, 1024));
        }
        fclose($file_handle);

        foreach ($array as $key => $arr){
            if($key != 0 && $arr != false) {
                $inv = new Invoice();
                $inv->person_id = $arr[0];
                $inv->amount = $arr[1];
                $inv->nature_payment = $arr[2];
                $inv->book_id = $arr[3];
                $inv->added_by = $arr[4];
                $inv->save();
            }
        }
    }
}
