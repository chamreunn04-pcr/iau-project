<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        // 1️⃣ Drop foreign keys
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropForeign(['permission_id']);
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->dropForeign(['permission_id']);
        });

        // 2️⃣ Change permissions.id to UUID
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropPrimary();
            $table->ulid('id')->primary()->change();
        });

        // 3️⃣ Change FK columns to UUID
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->ulid('permission_id')->change();
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->ulid('permission_id')->change();
        });

        // 4️⃣ Re-add foreign keys
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->cascadeOnDelete();
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        // optional rollback (usually not needed in prod)
    }
};
