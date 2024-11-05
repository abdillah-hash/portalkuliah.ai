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
        Schema::create('students', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->integer('account_id')->nullable(false);
            $table->string('phone',20)->nullable(false);
            $table->year('born_year')->nullable(false);
            $table->string('job_type',255)->nullable(false);
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
        Schema::dropIfExists('students');
    }
};
