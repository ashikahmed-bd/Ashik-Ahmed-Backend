<?php

use App\Enums\PostStatus;
use App\Enums\Status;
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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('tags')->nullable();
            $table->longText('description')->nullable();
            $table->longText('image')->nullable();
            $table->string('disk')->default(config('app.disk'));
            $table->dateTime('published_at')->nullable();
            $table->boolean('active')->default(true);

            $table->foreignUuid('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained('users');
            $table->timestamps();
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
