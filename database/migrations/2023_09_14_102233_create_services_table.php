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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service')->unique();
            $table->string('slug');
            $table->integer('media_id')->nullable();
            $table->string('img_alt')->nullable();
            $table->text('description')->nullable();
            $table->text('about')->nullable();
            $table->text('documents')->nullable();
            $table->text('stdcosttime')->nullable();
            $table->text('process')->nullable();
            $table->string('seotitle')->nullable();
            $table->text('seodescription')->nullable();
            $table->text('seokeywords')->nullable();
            $table->text('seometa')->nullable();
            $table->text('faq')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
