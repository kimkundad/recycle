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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_pro')->nullable();
            $table->integer('cat_id')->default('0');
            $table->integer('sub_cat_id')->default('0');
            $table->string('brand')->nullable();
            $table->string('sku')->nullable();
            $table->string('weight')->nullable();
            $table->string('condition')->nullable();
            $table->double('amount', 8, 2)->default('0.00');
            $table->integer('discount')->default('0');
            $table->integer('sum')->default('0');
            $table->text('title_pro')->nullable();
            $table->text('detail_pro')->nullable();
            $table->string('image_pro')->nullable();
            $table->integer('type_pro')->default('0');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('products');
    }
};
