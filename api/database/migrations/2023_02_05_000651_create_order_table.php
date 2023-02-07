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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('user_id')->index()->constrained('user');
            $table->string('code')->unique();
            $table->enum('status', \App\Models\Order::STATUSES)->index();
            $table->foreignId('delivery_id')->constrained('delivery');
            $table->foreignId('payment_id')->constrained('payment');
            $table->decimal('total');
            $table->decimal('delivery_cost');

            // Shipping information
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('email', 50);
            $table->string('phone', 15)->nullable();
            $table->string('address_line_1', 50);
            $table->string('address_line_2', 50)->nullable();
            $table->string('city', 50);
            $table->string('postal_code', 15);
            $table->string('country', 50);

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
        Schema::dropIfExists('order');
    }
};
