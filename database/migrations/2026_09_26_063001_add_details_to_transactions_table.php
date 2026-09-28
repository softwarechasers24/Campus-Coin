<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('title')->after('category_id');
            $table->date('transaction_date')->nullable()->after('amount');
            $table->text('description')->nullable()->after('transaction_date');
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'transaction_date',
                'description'
            ]);
        });
    }
};