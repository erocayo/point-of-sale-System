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
        Schema::create('user', function (Blueprint $table) {
            $table->id('USER_ID');
            $table->string('FIRST_NAME', length:255);
            $table->string('LAST_NAME', length:255);
            $table->string('USERNAME', length:255)->unique();     
            $table->string('PASSWORD_HASH',length: 255);  
            $table->unsignedBigInteger('ROLE_ID');
            $table->string('ADDRESS', length:255)->nullable();
            $table->string('CONTACT_NUMBER', length:255)->nullable();
            $table->unsignedBigInteger('ADMIN_ID')->nullable();

            $table->foreign('ROLE_ID')->references('ROLE_ID')->on('role');
            $table->foreign('ADMIN_ID')->references('USER_ID')->on('user')->nullOnDelete();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['user_ROLE_ID_foreign']);
            $table->dropForeign(['user_ADMIN_ID_foreign']);
        });

        Schema::dropIfExists('user');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
