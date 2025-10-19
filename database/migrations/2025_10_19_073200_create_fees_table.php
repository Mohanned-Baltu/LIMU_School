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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schoolId');
            $table->unsignedBigInteger('gradeId');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('schoolId')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('gradeId')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
