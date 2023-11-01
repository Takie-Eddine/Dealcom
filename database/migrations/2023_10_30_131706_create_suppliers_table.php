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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->char('country',2);
            $table->string('city')->nullable();
            $table->string('address','254');
            $table->string('postal_code')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_phone')->unique();
            $table->string('office_phone')->nullable()->unique();
            $table->enum('status',['active','inactive','archived'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
