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
        Schema::create('buy_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reply_id');
            $table->string('items');
            $table->integer('quantity')->default(1);
            $table->integer('price');
            $table->foreign('reply_id')->references('id')
                ->on('replies')->cascadeOnDelete();
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
        Schema::dropIfExists('buy_orders');
    }
};
