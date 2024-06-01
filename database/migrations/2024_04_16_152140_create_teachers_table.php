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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->string('teacher_id',10)->unique();
            $table->string('email')->unique();
            $table->string('mobile_number',10)->unique();
            $table->string('gender');
            $table->string('course_name');
            $table->string('branch_name');
            $table->string('role');
            $table->string('joing_date');
            $table->string('password');
            $table->string('status')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
