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
        Schema::create('tickets', function (Blueprint $table) {
            $table->integer('final_price');
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('seat_id')->constrained('seats');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('staff_id')->constrained('staff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
