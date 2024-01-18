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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('province_address')->nullable();
            $table->string('city_address')->nullable();
            $table->string('street_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('ktp_number')->nullable();
            $table->string('current_position')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
