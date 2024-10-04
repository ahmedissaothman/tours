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
        Schema::create('recommended_packages', function (Blueprint $table) {
            $table->bigIncrements('recommended_packages_id');
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
        Schema::dropIfExists('recommended_packages');
    }
};
