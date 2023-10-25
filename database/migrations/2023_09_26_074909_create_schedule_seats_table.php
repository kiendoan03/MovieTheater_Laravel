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
        Schema::create('schedule_seats', function (Blueprint $table) {
            $table->foreignId('schedule_id')->constrained('schedules')
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->foreignId('seat_id')->constrained('seats')
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->primary(['schedule_id', 'seat_id']);
            $table->integer('status');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->default(null);
            $table->foreignId('staff_id')->nullable()->constrained('staff')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_seats');
    }
};
