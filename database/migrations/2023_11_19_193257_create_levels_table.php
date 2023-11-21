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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('libelle');
            $table->integer('scolarite');
            $table->foreignId('school_year_id')->constrained( table: 'school_years', indexName: 'school_year_id');

            // $table->unsignedBigInteger('school_year_id');
            // $table->foreign('school_year')->references('id')->on('school_years');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
