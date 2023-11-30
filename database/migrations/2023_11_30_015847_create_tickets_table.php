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
            $table->date('submission')->default(now());
            $table->date('research')->nullable();
            $table->date('response')->nullable();
            $table->date('finished')->nullable();
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
