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
        Schema::create('packages', function (Blueprint $table) { 
            $table->bigIncrements('package_id');
            $table->string('name'); 
            $table->unsignedBigInteger('type_id');
            $table->decimal('price', 8, 2);
            $table->text('description');  
            $table->string('image')->nullable(); 
            $table->timestamps(); 
            $table->softDeletes(); 


            $table->foreign('type_id')->references('type_id')->on('package_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
