<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cv_template_id')->nullable()->constrained('cv_templates')->nullOnDelete();
            $table->string('title')->default('My CV');
            $table->string('slug')->unique();
            $table->string('status')->default('draft'); // draft, completed
            $table->string('current_step')->default('personal');
            $table->integer('completion')->default(0);
            $table->timestamp('last_edited_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
