<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name');
            $table->float('rating',2,1);
            $table->string('description');
            $table->text('logo_img');
            $table->text('poster_img');
            $table->text('thumbnail_img');
            $table->string('language');
            $table->integer('length');
            $table->date('release_date');
            $table->date('end_date');
            $table->text('trailer');
            $table->integer('age');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
