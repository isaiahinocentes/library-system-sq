<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string("borrower_name");
            $table->string("borrower_id");
            $table->unsignedInteger("book_id"); //Foreign
            $table->timestamp("reservation_date")->nullable();
            $table->timestamp("reservation_expiration")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('reservations', function(Blueprint $table){
            $table->foreign('book_id')
                ->references('id')
                ->on('books');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
