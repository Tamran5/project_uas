<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hub_product_id')->nullable();
            $table->string('name', 255); // name: string(255), required
            $table->string('slug', 255)->unique(); // slug: string(255), unique
            $table->text('description')->nullable(); // description: text, nullable
            $table->string('sku', 50)->unique(); // sku: string(50), unique
            $table->decimal('price', 10, 2)->unsigned(); // price: decimal(10,2), >= 0
            $table->integer('stock')->default(0)->unsigned(); // stock: integer, default 0, >= 0
            $table->unsignedBigInteger('product_category_id')->nullable(); // product_category_id: unsignedBigInteger, nullable
            $table->string('image_url', 255)->nullable(); // image_url: string(255), nullable
            $table->boolean('is_active')->default(true); // is_active: boolean, default true
            $table->timestamps(); // created_at & updated_at

            // Foreign Key Constraint
            $table->foreign('product_category_id')
                ->references('id')->on('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
