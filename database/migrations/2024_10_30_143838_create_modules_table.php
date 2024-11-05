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
        Schema::create('modules', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string('name',255)->nullable(false);
            $table->string('slug',255)->nullable(false);
            $table->integer('total_level')->nullable(false);
            $table->string('video')->nullable(false);
            $table->unsignedBigInteger('companies_id')->nullable(false);
            $table->timestamps();

            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
