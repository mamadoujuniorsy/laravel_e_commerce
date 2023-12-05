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
            $table->id(); //Auto-incremental Primary key
            $table->text('name');
            $table->text('description');
            $table->decimal('price', 10, 2); // Adjust the precision and scale as needed
            $table->unsignedBigInteger('category_id');
            $table->integer('stock_quantity');
            $table->timestamps();

            // Foreign key constraint to Categories table
            $table->foreign('category_id')->references('category_id')->on('categories')
                ->onDelete('cascade'); // Cascade on delete for referential integrity

        
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
