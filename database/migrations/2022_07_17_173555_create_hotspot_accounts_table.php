<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hotspot_accounts', function (Blueprint $table) {
            $table->id();

            // Account Information
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('identity_number')->nullable();

            $table->string('password');

            $table->string('phone')->nullable();
            $table->string('phone_verified_token')->nullable()->unique();


            $table->dateTime('phone_verified_at')->nullable();
            $table->dateTime('identity_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotspot_accounts');
    }
};
