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
            $table->string('description')->nullable();

            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->string('receiver_type')->nullable();
            
            $table->unsignedBigInteger('payer_id')->nullable();
            $table->string('payer_type')->nullable();

            $table->unsignedBigInteger('purpose_id');
            $table->string('purpose_type');
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
