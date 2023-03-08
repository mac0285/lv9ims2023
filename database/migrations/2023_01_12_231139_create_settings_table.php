<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('branch_code', 8);
            $table->string('name', 100);
            $table->string('factory', 100);
            $table->string('telp', 25);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->string('pic', 100);
            $table->string('config', 100);
            $table->string('default', 100);
            $table->string('location', 100);
            $table->string('flag', 4);
            $table->string('log', 100);
            $table->string('current_team_id', 4);
            $table->string('active', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
