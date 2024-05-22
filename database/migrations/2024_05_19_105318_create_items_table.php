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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->string('synopsis', 255)->nullable(false);
            $table->integer('year')->nullable(false);
            $table->integer('episodes')->nullable(false);
            $table->string('studio', 100)->nullable(false);
            $table->string('author', 100)->nullable(false);
            $table->string('status', 15)->nullable(false);
            $table->string('photo_link', 150)->nullable();
            $table->string('genre', 100)->nullable(false);
            $table->integer('rating')->default(0);
            $table->integer('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
