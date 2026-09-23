<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_generations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cv_id')->nullable()->constrained('cvs')->cascadeOnDelete();
            $table->string('type'); // summary, job_description, skills, project_description, improve, ats_analysis, job_match
            $table->text('prompt')->nullable();
            $table->text('response')->nullable();
            $table->string('status')->default('success'); // success, failed
            $table->unsignedInteger('tokens')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_generations');
    }
};
