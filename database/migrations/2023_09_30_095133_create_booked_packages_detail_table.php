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
        Schema::create('booked_packages_detail', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('room_id');
            $table->bigInteger('booking_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('status');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_packages_detail');
    }
};
