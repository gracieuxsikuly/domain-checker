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
        Schema::create('extensions', function (Blueprint $table) {
            $table->id();
            $table->string('extension')->unique(); // com, org, etc.
            $table->decimal('prix', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable(); // Prix précédent, si applicable
            $table->string('currency', 3)->default('USD'); // Devise, par défaut usd
            $table->boolean('is_active')->default(true); // Indique si l'extension est active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extensions');
    }
};
