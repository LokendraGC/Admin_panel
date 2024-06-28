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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('title');
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('status')->default('publish');
            $table->unsignedBigInteger('parent')->default(0);
            $table->string('type')->default('post');
            $table->integer('menu_order')->nullable();
            $table->timestamps();
            $table->softDeletes(); // For the deleted_at column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
