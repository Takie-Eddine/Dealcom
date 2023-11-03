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
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('supplier_id')->constrained('suppliers')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->float('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('sku');
            $table->json('options')->nullable();
            $table->float('rating')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('approved')->default(0);
            $table->boolean('price_list')->default(0);
            $table->enum('status',['active' , 'draft' , 'archived'])->default('active');
            $table->softDeletes();
            $table->timestamps();
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
