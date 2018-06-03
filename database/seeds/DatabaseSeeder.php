<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(){
        Model::unguard();

        $this->call(
            [
                BookSeeder::class,
                CirculationSeeder::class,
                InvoiceSeeder::class,
                AccountSeeder::class,

            ]
        );

        Model::reguard();
    }
}
