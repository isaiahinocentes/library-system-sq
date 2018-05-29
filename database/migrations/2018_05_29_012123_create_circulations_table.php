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
            $table->integer("book_id");
            $table->timestamp("borrowed_at")->nullable();
            $table->timestamp("return_by")->nullable();
            $table->timestamp("returned_at")->nullable();
            $table->integer("added_by");
            $table->timestamps();
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
