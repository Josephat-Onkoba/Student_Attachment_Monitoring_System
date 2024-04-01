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
        Schema::create('staff_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id')->foreign('staff_id')->references('id')->on('users')->where('user_type', 3)->onDelete('cascade');
            $table->unsignedBigInteger('student_id')->foreign('student_id')->references('user_id')->on('attachments')->onDelete('cascade');
            $table->date('allocation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_student');
    }
};
