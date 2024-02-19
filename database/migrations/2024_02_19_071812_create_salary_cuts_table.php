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
        Schema::create('salary_cuts', function (Blueprint $table) {
            $table->id('cut_id');
            $table->string('employee_id', 30);

            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->integer('amount');
            $table->string('note', 255);
            $table->string('status', 10);
            $table->string('created_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_cuts');
    }
};
