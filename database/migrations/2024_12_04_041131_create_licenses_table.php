<?php

use App\Enums\LicenseType;
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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('license_key')->unique();
            $table->string('allowed_domain')->nullable();
            $table->string('type')->default((LicenseType::TRIAL)->value);
            $table->date('issued_at');
            $table->date('expires_at')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });


        Schema::create('license_usages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('license_id')->constrained()->onDelete('cascade');
            $table->string('ip_address');
            $table->string('device_id')->nullable(); // Unique identifier for the client device
            $table->timestamp('used_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
        Schema::dropIfExists('license_usages');
    }
};
