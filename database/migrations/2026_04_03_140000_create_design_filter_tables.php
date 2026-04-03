<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('design_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('design_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('design_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('design_sizes');
        Schema::dropIfExists('design_materials');
        Schema::dropIfExists('design_types');
    }
};
