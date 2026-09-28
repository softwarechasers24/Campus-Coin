<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();

                $table->string('application_name')
                    ->default('Campus Coin');

                $table->string('currency')
                    ->default('PKR');

                $table->string('timezone')
                    ->default('Asia/Karachi');

                $table->string('date_format')
                    ->default('DD-MM-YYYY');

                $table->text('description')
                    ->nullable();

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};