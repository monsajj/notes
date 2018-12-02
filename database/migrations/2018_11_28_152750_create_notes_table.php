<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('file_id')->nullable();
            $table->string('slug', 100);
            $table->string('title', 100);
            $table->text('text');
            $table->boolean('public')->default(false);
            $table->text('tags')->nullable();
            $table->string('colour', 7);
            $table->integer('lifetime');
            $table->dateTime('deathdate');
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
        Schema::dropIfExists('notes');
    }
}
