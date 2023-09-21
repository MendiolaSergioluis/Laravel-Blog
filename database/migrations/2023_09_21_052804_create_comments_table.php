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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Referencias a otras tablas
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            // Otra forma de hacer referencia más directa
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->text('body');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
