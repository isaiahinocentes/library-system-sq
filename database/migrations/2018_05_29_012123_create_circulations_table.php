<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('circulations', function (Blueprint $table) {
            $table->increments('id');
            $table->string("person_id");
            $table->unsignedInteger("book_id"); // Foreign
            $table->timestamp("borrowed_at")->nullable();
            $table->timestamp("return_by")->nullable();
            $table->timestamp("returned_at")->nullable();
            $table->unsignedInteger("user_id"); //Foreign
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('circulations', function(Blueprint $table){
            $table->foreign('book_id')
                ->references('id')
                ->on('books');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circulations');
    }
}
