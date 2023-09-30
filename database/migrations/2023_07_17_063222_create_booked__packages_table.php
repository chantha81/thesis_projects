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
        Schema::create('booked__packages', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('arrival_date');
            $table->string('depature_date');
            $table->string('room_ids');
            $table->string('place_camping');
            $table->string('tent_id');
            $table->string('total_price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked__packages');
    }
};
