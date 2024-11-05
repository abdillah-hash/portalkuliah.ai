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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string('name',255)->nullable(false);
            $table->unsignedBigInteger('modules_id')->nullable(false);
            $table->unsignedBigInteger('students_id')->nullable(false);
            $table->integer('level')->nullable(false);
            $table->timestamps();

            $table->foreign('modules_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
