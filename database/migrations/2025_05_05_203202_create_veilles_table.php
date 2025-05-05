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
        Schema::create('veilles', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('contenu')->nullable();
            $table->string('source')->nullable(); // URL ou lien PDF
            $table->string('type')->default('lien'); // 'lien' ou 'pdf'
            $table->string('image')->nullable();
            $table->string('categorie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veilles');
    }
};
