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
        Schema::table('komputers', function (Blueprint $table) {
            //
            $table->timestamp('buy_at')->after('dept_comp')->nullable();
            $table->timestamp('destroy_at')->after('buy_at')->nullable();
            $table->string('flag')->after('destroy_at')->nullable();
            $table->string('photo')->after('flag')->nullable();
            $table->string('file_name')->after('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komputers', function (Blueprint $table) {
            //
        });
    }
};
