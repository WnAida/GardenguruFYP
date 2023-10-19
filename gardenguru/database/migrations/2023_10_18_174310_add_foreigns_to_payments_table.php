<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table
            ->foreign('transaction_id')
            ->references('id')
            ->on('transactions')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table
            ->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
