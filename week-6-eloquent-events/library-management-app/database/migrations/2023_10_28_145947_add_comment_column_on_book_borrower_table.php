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
        Schema::table('book_borrower', function (Blueprint $table) {
            $table->string('comment', 1000)->nullable()->after('borrower_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_borrower', function (Blueprint $table) {
            $table->dropColumn(['comment']);
        });
    }
};
