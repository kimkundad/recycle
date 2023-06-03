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
        Schema::create('unit_products', function (Blueprint $table) {
            $table->id();
            $table->string('name_unit')->nullable();
            $table->string('unit2')->nullable();
            $table->string('unit3')->nullable();
            $table->integer('unit_status')->default('0');
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
        Schema::dropIfExists('unit_products');
    }
};
