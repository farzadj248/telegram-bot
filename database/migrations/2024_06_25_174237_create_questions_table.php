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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("question");
            $table->text("answer");
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->text("mis1")->nullable();
            $table->text("mis2")->nullable();
            $table->text("mis3")->nullable();
            $table->text("mis4")->nullable();
            $table->text("mis5")->nullable();
            $table->text("mis6")->nullable();
            $table->integer("score")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
