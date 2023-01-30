<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->foreignId('product_id')->index()->constrained();
            $table->foreignId('category_id')->index()->constrained();

            $table->primary(['product_id', 'category_id']);
        });
    }
}
