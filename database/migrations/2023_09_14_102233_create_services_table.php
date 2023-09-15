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
            $table->text('description')->nullable();
            $table->text('mandatory')->nullable();
            $table->text('documents')->nullable();
            $table->text('stdcosttime')->nullable();
            $table->text('process')->nullable();
            $table->text('faq')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('tumb_id')->nullable();
            $table->string('tumb_alt')->nullable();
            $table->string('img_id')->nullable();
            $table->string('img_alt')->nullable();
            $table->text('list_guide')->nullable();
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
