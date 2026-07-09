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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('max_score')->default(100);
            $table->timestamp('deadline_at')->nullable();
            $table->boolean('is_published')->default(true);
            $table->boolean('allow_late')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('classroom_id', 'idx_assignments_classroom');
            $table->index('deadline_at', 'idx_assignments_deadline');
        });

        Schema::create('assignment_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->string('file_path', 500);
            $table->string('file_name');
            $table->unsignedBigInteger('file_size')->default(0);
            $table->string('mime_type', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('file_path', 500);
            $table->string('file_name');
            $table->unsignedBigInteger('file_size')->default(0);
            $table->text('note')->nullable();
            $table->enum('status', ['submitted', 'late', 'graded'])->default('submitted');
            $table->decimal('score', 5, 2)->nullable();
            $table->text('feedback')->nullable();
            $table->timestamp('graded_at')->nullable();
            $table->timestamp('submitted_at')->useCurrent();
            $table->timestamps();

            $table->unique(['assignment_id', 'student_id'], 'unique_submission');
            $table->index('status', 'idx_submissions_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
        Schema::dropIfExists('assignment_attachments');
        Schema::dropIfExists('assignments');
    }
};
