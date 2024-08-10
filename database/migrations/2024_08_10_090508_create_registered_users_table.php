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
        Schema::create('registered_users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('organization');
            $table->string('country');
            $table->string('comments')->nullable();
            $table->string('membership');
            $table->string('payment_slip')->nullable();
            $table->string('title');
            $table->string('status')->default('registered')->nullable();
            $table->string('confirm_payment');
            $table->string('mobile_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_users');
    }
};
