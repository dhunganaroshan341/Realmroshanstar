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
        Schema::create('ctas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('video_title')->nullable();
            $table->string('video_description')->nullable();
            $table->string('video_button_text')->nullable();
            $table->string('video_button_link')->nullable();
            $table->string('video_button_link_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctas');
    }
};
