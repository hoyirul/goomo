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
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('')->constrained();
            $table->foreignId('motorcycle_type_id')->constrained();
            $table->foreignId('motorcycle_brand_id')->constrained();
            $table->string('motorcycle_name', 50);
            $table->integer('production_year')->nullable();
            $table->string('police_number')->nullable();
            $table->text('motorcycle_photo')->nullable();
            $table->text('vehicle_registration')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('motorcycles');
    }
};
