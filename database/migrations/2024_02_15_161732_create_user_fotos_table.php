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
        Schema::create('user_fotos', function (Blueprint $table) {
            $table->id('no_foto');
            $table->string('id_user', 30);
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('foto', 200);
    
            $table->string('delete_mark', 1);
            $table->string('created_by', 30);
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
        Schema::dropIfExists('user_fotos');
    }
};
