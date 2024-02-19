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
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id('no_activity');
            $table->string('id_user', 30);
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->string('deskripsi', 300);
            $table->string('status', 30);
            $table->string('menu_id', 3);

            $table->string('delete_mark', 1);
            $table->string('created_by', 30);
            $table->timestamp('created_date');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};
