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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_name')->unique();
            $table->text('news')->nullable();
            $table->string('news_image')->nullable();
            $table->string('news_alt')->nullable();
            $table->string('news_url')->nullable();
            $table->text('news_description')->nullable();
            $table->string('news_titles')->nullable();
            $table->text('news_keywords')->nullable();
            $table->text('news_tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
