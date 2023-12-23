<?php

use App\Enums\RegistrationStatusEnum;
use App\Enums\UserExpertiseEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('expertise', UserExpertiseEnum::toValues())->default(UserExpertiseEnum::Beginner());
            // $table->enum('registration_status', RegistrationStatusEnum::toValues())->default(RegistrationStatusEnum::WaitingApproval());
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->text('profile_photo_path')->nullable();
            // $table->boolean('is_seller')->nullable();
            // $table->unsignedBigInteger('bank_id')->nullable();
            // $table->string('account_no')->nullable();



            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
