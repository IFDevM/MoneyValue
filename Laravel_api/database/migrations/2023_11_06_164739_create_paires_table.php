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
            $table->id();
            $table->string('SourceCurrency')->foreign_key;
            $table->string('TargetCurrency');
            $table->decimal('rate');
            $table->timestamp('updatedAt');
            $table->string('NumberOfRequests');
            $table->timestamps();
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
