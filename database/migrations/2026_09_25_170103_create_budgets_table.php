<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('category');
            $table->string('month', 7);
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('spent', 12, 2)->default(0);

            $table->timestamps();

            $table->index('month');
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};