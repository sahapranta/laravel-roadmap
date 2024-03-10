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
        Schema::create('features', function (Blueprint $table) {
            $table->uuid();
            $table->string('type')->default(head(array_keys(config('roadmap.types', ['need_feedback']))))->index();
            $table->string('name');
            $table->string('status')->nullable();
            $table->dateTime('target_release')->nullable();
            $table->text('description')->nullable();
            $table->integer('votes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmaps');
    }
};
