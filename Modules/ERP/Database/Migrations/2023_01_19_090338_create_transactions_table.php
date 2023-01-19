<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount');
            $table->string('description');

            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_type');
            
            $table->unsignedBigInteger('payer_id');
            $table->string('payer_type');

            $table->unsignedBigInteger('purpose_id')->nullable();
            $table->string('purpose_type')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
