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
        // Builds table
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // build creator
            $table->string('title', 100);
            $table->text('content');
            $table->json('item_list')->nullable(); // optional item data
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // Pivot table for Build <-> Item
        Schema::create('build_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_id')->constrained('builds')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for Build <-> User (for collaborators, favorites, etc.)
        Schema::create('build_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_id')->constrained('builds')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['build_id', 'user_id']); // prevent duplicates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('build_user');
        Schema::dropIfExists('build_item');
        Schema::dropIfExists('builds');
    }
};
