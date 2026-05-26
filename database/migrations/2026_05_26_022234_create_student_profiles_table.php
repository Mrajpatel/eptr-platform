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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('student_id')->nullable();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();

            $table->string('citizenship')->nullable();

            $table->string('other_address')->nullable();

            $table->string('phone')->nullable();
            $table->string('other_phone')->nullable();

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();

            $table->string('licence_number')->nullable();

            $table->date('date_of_birth')->nullable();

            $table->date('medical_date')->nullable();
            $table->date('medical_expiry')->nullable();

            $table->string('medical_category')->nullable();

            $table->string('cohort')->nullable();

            $table->foreignId('primary_instructor_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('secondary_instructor_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
