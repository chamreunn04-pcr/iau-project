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
            $table->ulid('id')->primary();
            $table->ulid('system_id');
            $table->string('name');   // Leave, Attendance
            $table->string('slug');   // leave, attendance
            $table->timestamps();

            $table->foreign('system_id')
                ->references('id')
                ->on('systems')
                ->onDelete('cascade');
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
