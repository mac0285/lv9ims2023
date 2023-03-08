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
        Schema::create('webconfigs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('factory');
            $table->string('telp');
            $table->string('email');
            $table->string('address');
            $table->string('pic');
            $table->string('config');
            $table->string('default');
            $table->string('location');
            $table->string('flag',2);            
            $table->string('log');
            $table->string('branch_code', 100);
            $table->string('current_team_id',2);
            $table->string('active',2);
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
        Schema::dropIfExists('webconfigs');
    }
};
