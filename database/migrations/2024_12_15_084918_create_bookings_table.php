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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('futsal_ground_id')->constrained()->onDelete('cascade');
            $table->string('customer_phone');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('total_amount', 8, 2)->nullable(); // Amount based on price per hour
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
