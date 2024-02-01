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
       Schema::create('comics', function (Blueprint $table) {
           $table->bigIncrements('id');

           $table->string('title', 70);
           $table->text('description')->nullable();
           $table->string('thumb', 400);
           $table->decimal('price');
           $table->string('series', 40)->nullable();
           $table->date('sale_date')->nullable();
           $table->string('type',40)->nullable();
           $table->string('artists', 100)->nullable();
           $table->string('writers', 100)->nullable();

           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
