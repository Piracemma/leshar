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
        Schema::create('dados_profissaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profissao_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->string('funcao');
            $table->text('oque_fez');
            $table->boolean('in_leshar')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_profissaos');
    }
};
