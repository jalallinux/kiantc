<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_product_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_product_id')->constrained('attribute_product')->cascadeOnDelete();
            $table->string('label');
            $table->string('value');
            $table->decimal('price', 16, 0);
            $table->unsignedBigInteger('sell_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_product_values');
    }
};
