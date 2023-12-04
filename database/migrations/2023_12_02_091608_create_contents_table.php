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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title',254)->nullable();
            $table->string('sub_title',254)->nullable();
            $table->string('image',254)->nullable();
            $table->enum('position',['top','center','bottom']);
            $table->enum('page',['home','category','product']);
            $table->enum('status',['active','draft']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
