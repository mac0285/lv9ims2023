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
        Schema::create('branchoffices', function (Blueprint $table) {
            $table->id();
            $table->string('branch_code', 100);
            $table->string('branch', 100);
            $table->string('type', 100);
            $table->string('l1', 100);
            $table->string('l2', 100);
            $table->string('l3', 100);
            $table->date('build_date');
            $table->date('opening_date'); 
            $table->string('address1', 100);
            $table->string('address2', 100);
            $table->string('address3', 100);  
            $table->string('phone_code', 100);          
            $table->string('phone_land', 100);            
            $table->string('mail_address', 100);            
            $table->string('npwp', 100);            
            $table->string('city', 100);
            $table->string('postal_code', 100);
            $table->string('province', 100);
            $table->string('country', 100);           
            $table->string('remark', 100);
            $table->string('current_team_id',2);
            $table->string('active',2);
            $table->softDeletes();
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
        Schema::dropIfExists('branchoffices');
    }
};
