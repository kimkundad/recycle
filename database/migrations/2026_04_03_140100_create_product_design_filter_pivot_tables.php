<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_design_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('design_type_id');
            $table->timestamps();

            $table->unique(['product_id', 'design_type_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('design_type_id')->references('id')->on('design_types')->onDelete('cascade');
        });

        Schema::create('product_design_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('design_material_id');
            $table->timestamps();

            $table->unique(['product_id', 'design_material_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('design_material_id')->references('id')->on('design_materials')->onDelete('cascade');
        });

        Schema::create('product_design_size', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('design_size_id');
            $table->timestamps();

            $table->unique(['product_id', 'design_size_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('design_size_id')->references('id')->on('design_sizes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_design_size');
        Schema::dropIfExists('product_design_material');
        Schema::dropIfExists('product_design_type');
    }
};
