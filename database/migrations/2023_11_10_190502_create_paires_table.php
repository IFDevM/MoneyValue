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
        Schema::create('paires', function (Blueprint $table) {
            $table->engine = 'InnoDb';
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('SourceCurrency_id');
            $table->unsignedBigInteger('TargetCurrency_id');
            $table->float('rate');
            $table->integer('NumberofRequests')->default(0)->nullable();
            
         
            $table->foreign('SourceCurrency_id')->references('id')->on('devises');
            $table->foreign('TargetCurrency_id')->references('id')->on('devises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paires');
    }
};
