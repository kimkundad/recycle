<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePageInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('sale_page_inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_page_id');
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('company', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('message')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('sale_page_id')->references('id')->on('sale_pages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sale_page_inquiries');
    }
}
