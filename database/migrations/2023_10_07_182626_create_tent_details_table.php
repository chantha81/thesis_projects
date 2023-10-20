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
        Schema::create('tent_details', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->nullable();
            $table->integer('tent_id')->nullable();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tent_details');
    }
};
