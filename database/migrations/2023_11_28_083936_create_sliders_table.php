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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name',254);
            $table->enum('position',['top','center','bottom']);
            $table->enum('page',['home','category','product']);
            $table->string('image',254);
            $table->string('link',254);
            $table->enum('status',['active','draft'])->default('draft');
            $table->char('locale',4)->default('en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
