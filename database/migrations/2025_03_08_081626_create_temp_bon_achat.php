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
        Schema::create('temp_bon_achat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_product')
                ->constrained('products')
                ->onDelete('cascade');
            $table->foreignId('id_user')
                ->constrained('users')
                ->onDelete('cascade');
            $table->integer('qte')->default(0); // Set default value of 0
            $table->decimal('prix_unitaire', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_bon_achat');
    }
};
