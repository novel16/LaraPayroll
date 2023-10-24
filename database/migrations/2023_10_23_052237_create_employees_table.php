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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('employee_id');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->text('address');
            $table->date('birthdate');
            $table->string('contact', 20);
            
            // Set 'gender' as VARCHAR with a length of 8
            $table->string('gender', 8);
    
            // Add foreign key constraints
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('schedule_id')->nullable();
    
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('set null');
    
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
