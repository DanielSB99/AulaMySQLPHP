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
        Schema::create('easter_gift', function (Blueprint $table) {
            $table->id();
            $table->string('nome_da_prenda');
            $table->decimal('valor_previsto');
            $table->foreignId('user_id');
            $table->decimal('valor_gasto')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('easter_gift');
    }
};
