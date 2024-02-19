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
            $table->string('employee_id', 30)->primary();
            $table->string('id_user', 30);
            $table->string('role_id', 30);
            $table->timestamp('start_working');
            $table->string('address', 30);
            $table->string('city', 30);
            

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->string('assigned_by', 30);
            $table->string('updated_by', 30)->nullable();
            $table->softDeletes();
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
