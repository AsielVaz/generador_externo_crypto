<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('generated_keys', function (Blueprint $table): void {
            $table->id();
            $table->string('key_code')->unique();
            $table->string('email');
            $table->decimal('amount', 12, 2);
            $table->string('evidence_path');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('generated_keys');
    }
};
