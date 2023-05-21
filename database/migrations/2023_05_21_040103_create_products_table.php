<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo')->default(1000);
            $table->char('descripcion');
            $table->integer('stock');
            $table->integer('stock_minimo');
            $table->decimal('precio_compra', 8, 3);
            $table->decimal('precio_maximo', 8, 3);
            $table->decimal('precio_medio', 8, 3);
            $table->decimal('precio_minimo', 8, 3);
            $table->decimal('precio_flotante', 8, 3);
            $table->timestamps();
            $table->softDeletes();
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
