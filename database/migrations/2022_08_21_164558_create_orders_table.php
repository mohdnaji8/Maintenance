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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('circle_id');
            $table->string('employee');
            $table->date('date');
            $table->integer('building');
            $table->string('floor_number');
            $table->integer('room_number');
            $table->string('maintenance_type');
            $table->string('phone');
            $table->text('description');
            $table->integer('active')->default(1);
            $table->foreign('circle_id')->references('id')
                ->on('circles')->cascadeOnDelete();
            $table->foreign('requester_id')->references('id')
                ->on('departments')->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
};
