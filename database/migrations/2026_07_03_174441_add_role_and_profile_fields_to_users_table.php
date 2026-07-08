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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['citizen', 'admin', 'department'])->default('citizen')->after('password');
            $table->enum('status', ['pending', 'active', 'blocked'])->default('active')->after('role');
            $table->string('phone')->nullable()->after('status');
            $table->string('nrc_number')->nullable()->unique()->after('phone');
            $table->foreignId('department_id')->nullable()->after('nrc_number')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('department_id');
            $table->dropColumn(['role', 'status', 'phone', 'nrc_number']);
        });
    }
};
