<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->timestamp('visited_at');
            $table->index('visited_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
