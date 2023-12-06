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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->text('risk')->nullable();
            $table->integer('layers')->default(1);
            $table->dateTime('submission')->default(now());
            $table->dateTime('research')->nullable();
            $table->integer('user_research')->nullable();
            $table->dateTime('response')->nullable();
            $table->integer('user_response')->nullable();
            $table->string('updated_response')->nullable();
            $table->dateTime('finished')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
