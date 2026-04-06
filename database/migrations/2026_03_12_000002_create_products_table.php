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
            $table->string('nom');
            $table->text('description')->nullable();
            $table->integer('quantite')->default(1);
            $table->decimal('prix', 10, 2);
            $table->string('url')->nullable();
            $table->string('style')->nullable(); // Traditionnel, Moderne, Fusion
            $table->string('color')->nullable();
            $table->string('size')->nullable(); // XS, S, M, L, XL
            $table->string('ceremony_type')->nullable(); // Mariage, Fiançailles, Henné, Soirée
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
