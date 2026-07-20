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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->foreignId('issued_by')->constrained('users'); // teacher who issued
            $table->string('certificate_number', 50)->unique();
            $table->string('title'); // e.g. "Sertifikat Kelulusan Matematika XI IPA"
            $table->text('description')->nullable();
            $table->enum('type', ['completion', 'achievement', 'participation'])->default('completion');
            $table->decimal('final_score', 5, 2)->nullable();
            $table->timestamp('issued_at')->useCurrent();
            $table->timestamps();

            $table->unique(['student_id', 'classroom_id'], 'unique_student_classroom_cert');
            $table->index('certificate_number', 'idx_cert_number');
        });

        // Add max_students to classrooms for student restriction
        Schema::table('classrooms', function (Blueprint $table) {
            $table->unsignedInteger('max_students')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropColumn('max_students');
        });
        Schema::dropIfExists('certificates');
    }
};
