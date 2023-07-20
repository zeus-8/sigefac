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

            $table->unsignedBigInteger('brand_id')->default(0);
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');

            $table->char('codigo')->nullable();
            $table->char('cod_prov')->nullable()->unique();
            $table->char('descripcion');
            $table->integer('cantidad_u');
            $table->integer('cantidad_eu');
            $table->integer('stock')->default(0);
            $table->integer('stock_minimo')->default(0);
            $table->integer('peso');

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
