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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('staff_email');
            $table->string('staff_phonenumber',10);
            $table->string('staff_address');
            $table->string('staff_username');
            $table->string('password');
            $table->string('staff_avatar');
            $table->string('staff_date_of_birth');
            $table->string('staff_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
