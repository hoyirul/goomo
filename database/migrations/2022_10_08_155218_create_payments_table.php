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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_operator_id')->constrained();
            $table->string('txid')->nullable();
            $table->foreign('txid')->references('txid')->on('transactions');
            $table->string('invoice', 20);
            $table->text('evidence_of_transafer')->nullable();
            $table->dateTime('paid_date')->nullable();
            $table->float('pay');
            $table->enum('status', ['unpaid', 'processing', 'paid'])->default('unpaid');
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
        Schema::dropIfExists('payments');
    }
};
