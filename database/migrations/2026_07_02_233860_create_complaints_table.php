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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // တိုင်ကြားသူ
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('location'); // လိပ်စာ/မှတ်တိုင်
            $table->string('photo_path')->nullable(); // ဓာတ်ပုံအတွက်
            $table->enum('status', ['pending', 'in_progress', 'resolved'])->default('pending');
            $table->foreignId('department_id')->nullable()->constrained(); // သက်ဆိုင်ရာဌာန
            $table->string('resolution_photo_path')->nullable(); // သက်သေဓာတ်ပုံ
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
