<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactsToSalePagesTable extends Migration
{
    public function up()
    {
        Schema::table('sale_pages', function (Blueprint $table) {
            $table->text('contacts')->nullable()->after('inquiry_label');
        });
    }

    public function down()
    {
        Schema::table('sale_pages', function (Blueprint $table) {
            $table->dropColumn('contacts');
        });
    }
}
