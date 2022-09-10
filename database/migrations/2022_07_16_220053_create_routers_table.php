<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('routers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('identity');
            $table->text('description')->nullable();

            $table->string('ip_address');
            $table->integer('api_port');
            $table->string('api_username');
            $table->string('api_password');
            $table->string('log_prefix');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('routers');
    }
};
