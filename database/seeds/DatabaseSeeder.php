<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(){
        $this->call(
            [
                BookSeeder::class,
                CirculationSeeder::class,
                InvoiceSeeder::class
            ]
        );
    }
}
