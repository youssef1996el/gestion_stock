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
        Schema::create('ligne_vente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vente')
                ->constrained('vente')
                ->onDelete('cascade');
            $table->foreignId('id_product')
                ->constrained('products')
                ->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('tva', 5, 2)->nullable();
            $table->timestamps();
            
            // Add check constraint for quantite
            // DB::statement('ALTER TABLE ligne_vente ADD CONSTRAINT check_ligne_vente_quantite_positive CHECK (quantite > 0)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_vente');
    }
};
