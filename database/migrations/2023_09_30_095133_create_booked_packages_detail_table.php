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
            $table->integer('room_id');
            $table->integer('book_id');
            $table->date('arrival_date');
            $table->date('depature_date');
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
