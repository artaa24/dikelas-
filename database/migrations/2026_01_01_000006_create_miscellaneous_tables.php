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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('classroom_id')->constrained('classrooms');
            $table->string('gradable_type', 100);
            $table->unsignedBigInteger('gradable_id');
            $table->decimal('score', 5, 2);
            $table->decimal('max_score', 5, 2)->default(100);
            $table->text('notes')->nullable();
            $table->foreignId('graded_by')->nullable()->constrained('users');
            $table->timestamps();

            $table->index(['student_id', 'classroom_id'], 'idx_grades_student_class');
            $table->index(['gradable_type', 'gradable_id'], 'idx_grades_gradable');
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('classroom_id')->nullable()->constrained('classrooms')->onDelete('cascade');
            $table->string('title');
            $table->longText('content');
            $table->boolean('is_pinned')->default(false);
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();

            $table->index('classroom_id', 'idx_announcements_classroom');
            $table->index('is_pinned', 'idx_announcements_pinned');
        });

        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->longText('content');
            $table->boolean('is_pinned')->default(false);
            $table->unsignedInteger('replies_count')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('classroom_id', 'idx_discussions_classroom');
        });

        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discussion_id')->constrained('discussions')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->json('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->index(['notifiable_type', 'notifiable_id'], 'idx_notifications_notifiable');
            $table->index('read_at', 'idx_notifications_read');
        });

        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('action', 100);
            $table->text('description')->nullable();
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->json('properties')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index('user_id', 'idx_activity_user');
            $table->index('action', 'idx_activity_action');
            $table->index('created_at', 'idx_activity_created');
            $table->index(['subject_type', 'subject_id'], 'idx_activity_subject');
        });

        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_path', 500);
            $table->unsignedBigInteger('file_size')->default(0);
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->enum('type', ['manual', 'scheduled'])->default('manual');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->longText('value')->nullable();
            $table->string('type', 20)->default('string'); // 'string', 'boolean', 'integer', 'json'
            $table->string('group', 50)->default('general');
            $table->timestamps();

            $table->index('group', 'idx_settings_group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('backups');
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('discussion_replies');
        Schema::dropIfExists('discussions');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('grades');
    }
};
