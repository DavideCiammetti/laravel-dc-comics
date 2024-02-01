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
        Schema::table('comics', function (Blueprint $table) {
            $table->string('title', 120)->change();
            $table->string('description', 4000)->nullable()->change();
            $table->string('thumb', 400)->change();
            $table->decimal('price')->change();
            $table->string('series', 200)->nullable()->change();
            $table->string('sale_date', 50)->nullable()->change();
            $table->string('type',40)->nullable()->change();
            $table->string('artists', 500)->nullable()->change();
            $table->string('writers', 400)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->string('title', 70)->change();
            $table->text('description')->nullable()->change();
            $table->string('thumb', 400)->change();
            $table->decimal('price')->change();
            $table->string('series', 40)->nullable()->change();
            $table->string('sale_date')->nullable()->change();
            $table->string('type',40)->nullable()->change();
            $table->string('artists', 100)->nullable()->change();
            $table->string('writers', 100)->nullable()->change();
        });
    }
};
