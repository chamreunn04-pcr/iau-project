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
        $teams = config('permission.teams');
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

        throw_if(empty($tableNames), Exception::class, 'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        throw_if($teams && empty($columnNames['team_foreign_key'] ?? null), Exception::class, 'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name', 166);
            $table->string('guard_name', 25);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) use ($teams, $columnNames) {
            $table->ulid('id')->primary();

            if ($teams || config('permission.testing')) {
                $table->ulid($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key']);
            }

            $table->string('name', 166);
            $table->string('guard_name', 25);
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(
                ($teams || config('permission.testing'))
                    ? [$columnNames['team_foreign_key'], 'name', 'guard_name']
                    : ['name', 'guard_name']
            );
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames, $teams) {
            $table->ulid('permission_id');

            $table->string('model_type');
            $table->ulid($columnNames['model_morph_key']);

            $table->index([$columnNames['model_morph_key'], 'model_type']);

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            if ($teams) {
                $table->ulid($columnNames['team_foreign_key']);
                $table->primary([
                    $columnNames['team_foreign_key'],
                    'permission_id',
                    $columnNames['model_morph_key'],
                    'model_type'
                ]);
            } else {
                $table->primary([
                    'permission_id',
                    $columnNames['model_morph_key'],
                    'model_type'
                ]);
            }
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames, $teams) {
            $table->ulid('role_id');

            $table->string('model_type');
            $table->ulid($columnNames['model_morph_key']);

            $table->index([$columnNames['model_morph_key'], 'model_type']);

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            if ($teams) {
                $table->ulid($columnNames['team_foreign_key']);
                $table->primary([
                    $columnNames['team_foreign_key'],
                    'role_id',
                    $columnNames['model_morph_key'],
                    'model_type'
                ]);
            } else {
                $table->primary([
                    'role_id',
                    $columnNames['model_morph_key'],
                    'model_type'
                ]);
            }
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->ulid('permission_id');
            $table->ulid('role_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        throw_if(empty($tableNames), Exception::class, 'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
};
