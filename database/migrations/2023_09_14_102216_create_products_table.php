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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product')->unique();
            $table->unsignedBigInteger('category_id');
            $table->text('remarks')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('info_list')->nullable();
            $table->unsignedBigInteger('guidelines')->nullable();
            $table->text('tags')->nullable();
            $table->integer('img_id')->nullable();
            $table->string('img_alt')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
