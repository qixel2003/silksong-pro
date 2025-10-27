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
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->string('titel', 100);
            $table->text('content');
            $table->json('item_list')->nullable(); // array-like storage
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('build_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_id')->constrained('build')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('build_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_id')->constrained('build')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });


    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
        Schema::dropIfExists('build_item');
        Schema::dropIfExists('build_user');
    }
};
