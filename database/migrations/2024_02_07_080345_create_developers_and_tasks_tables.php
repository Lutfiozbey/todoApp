<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create Developers And Todos Tables
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->createDevelopersTable();
        $this->createTasksTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('developers');
    }

    /**
     * Create the developers table.
     */
    private function createDevelopersTable(): void
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->timestamps();
        });
    }

    /**
     * Create the todos table.
     */
    private function createTasksTable(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->integer('task_id');
            $table->integer('difficulty');
            $table->integer('duration');
            $table->timestamps();
        });
    }
};
