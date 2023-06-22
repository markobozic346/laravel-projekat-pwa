<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        //
        Schema::create('appointments', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->enum('service_type', ['oil_change', 'tire_rotation', 'regular service', 'battery_replacement', 'other']);
            $table->enum('status', ['pending', 'approved', 'done', 'cancelled']);
            $table->date('date');
            $table->time('time');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('cars');
        Schema::dropIfExists('appointments');

    }
};