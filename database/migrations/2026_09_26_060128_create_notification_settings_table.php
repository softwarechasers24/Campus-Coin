<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('notification_settings')) {
            Schema::create('notification_settings', function (Blueprint $table) {
                $table->id();

                $table->foreignId('user_id')
                    ->constrained('users')
                    ->cascadeOnDelete();

                $table->boolean('new_user_registration')
                    ->default(true);

                $table->boolean('new_transactions')
                    ->default(true);

                $table->boolean('budget_alerts')
                    ->default(true);

                $table->boolean('weekly_reports')
                    ->default(false);

                $table->boolean('announcement_notifications')
                    ->default(true);

                $table->timestamps();

                $table->unique('user_id');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_settings');
    }
};