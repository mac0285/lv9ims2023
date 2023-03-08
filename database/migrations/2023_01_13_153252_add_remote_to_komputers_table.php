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
            //$table->string('remote')->unsigned()->nullable()->after('remark');
          //  $table->string('remote')->after('remark')->nullable();
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
