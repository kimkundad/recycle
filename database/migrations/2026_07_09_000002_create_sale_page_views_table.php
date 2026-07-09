<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_page_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_page_id')->constrained()->cascadeOnDelete();
            $table->string('ip', 45)->nullable();
            $table->timestamp('viewed_at')->useCurrent();
            $table->index(['sale_page_id', 'viewed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_page_views');
    }
};
