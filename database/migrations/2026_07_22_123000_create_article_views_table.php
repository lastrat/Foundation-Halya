<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained()->cascadeOnDelete();
            $table->string('ip_address')->nullable();
            $table->timestamp('viewed_at');
            $table->index(['news_id', 'viewed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_views');
    }
};
