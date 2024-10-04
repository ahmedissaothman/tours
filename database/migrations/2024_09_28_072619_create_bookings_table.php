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
            $table->bigIncrements('booking_id');
            $table->string('customer_name');
            $table->string('customer_email'); 
            $table->string('phone_number')->nullable(); 
            $table->integer('number_of_children')->default(0);
            $table->integer('number_of_adult')->default(1); 
            $table->date('booking_date')->required(); 
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending'); 
            $table->unsignedBigInteger('package_id');
            $table->timestamps(); 
            $table->softDeletes();

            $table->foreign('package_id')->references('package_id')->on('packages');
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
