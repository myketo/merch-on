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
        Schema::create('product_sku_attribute_value', function (Blueprint $table) {
            $table->foreignId('product_sku_id')->index()->constrained('product_sku');
            $table->foreignId('attribute_value_id')->index()->constrained('attribute_value');

            $table->primary(['product_sku_id', 'attribute_value_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sku_attribute_value');
    }
};
