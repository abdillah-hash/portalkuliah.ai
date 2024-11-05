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
        Schema::create('groups', function (Blueprint $table) {
            // Schema::create digunakan untuk membuat tabel baru bernama groups di database.
            $table->id()->nullable(false)->primary();
            $table->string('name',255)->nullable(false);
            $table->string('tag',50)->nullable(false);
            $table->string('image',255)->nullable(false);
            $table->string('description',255)->nullable();
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
        Schema::dropIfExists('groups');
    }
};
