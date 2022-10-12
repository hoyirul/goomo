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
        Schema::create('user_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name', 50);
            $table->enum('gender', ['male', 'female', 'hidden'])->default('hidden');
            $table->string('phone', 16)->nullable();
            $table->text('identity_photo')->nullable();
            $table->text('driver_license')->nullable();
            $table->text('selfie_photo')->nullable();
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
        Schema::dropIfExists('user_customers');
    }
};
