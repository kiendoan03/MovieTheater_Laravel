<?php

use App\Models\schedule_seat;
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
            $table->foreignId('schedule_seat_id')->constrained('schedule_seats');
            // $table->foreignId('schedule_id')->references('schedule_id')->on('schedule_seats') ->onDelete('cascade');;
            // $table->foreignId('seat_id')->references('seat_id')->on('schedule_seats') ->onDelete('cascade');;
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
        Schema::dropIfExists('tickets');
    }
};
