<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title")->nullable();
            $table->string("desc")->nullable();
            $table->string("author")->nullable();
            $table->string("category")->nullable();
            $table->string("date")->nullable();
            $table->unsignedInteger("user_id");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('books', function(Blueprint $table){
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
