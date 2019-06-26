<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('type_id');
            $table->integer('disabled');
            $table->decimal('size');
            $table->decimal('width');
            $table->decimal('price');
            $table->decimal('image');
            $table->text('description');
            $table->text('meta_desc');
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
        Schema::dropIfExists('tyres');
    }
}
