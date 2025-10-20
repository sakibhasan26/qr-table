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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->decimal('price',28, 8)->nullable();
            $table->longText('data')->nullable();
            $table->string('slug')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('popular')->nullable();
            $table->boolean('status')->nullable();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("admin_id");
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
