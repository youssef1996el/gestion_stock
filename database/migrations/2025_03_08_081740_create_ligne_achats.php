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
        Schema::create('ligne_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_achat')
                ->constrained('achats_s', 'id') // Corrected to 'achats_s'
                ->onDelete('cascade');
            $table->foreignId('id_product')
                ->constrained('products', 'id') // Ensure this references the correct 'products' table
                ->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->timestamps();
            
            // Ensure InnoDB engine
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_achats');
    }
};
