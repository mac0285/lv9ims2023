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
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->string('barcode', 150)->nullable();
            $table->string('sku', 150)->nullable();
            $table->string('qty', 150)->nullable();
            $table->string('desc', 100)->nullable(); 
            $table->string('picture', 100)->nullable();
            $table->string('price1', 150)->nullable(); 
            $table->string('price2', 150)->nullable(); 
            $table->string('price3', 150)->nullable(); 
            $table->string('price4', 150)->nullable(); 
            $table->string('disc', 150)->nullable(); 
            $table->string('member', 150)->nullable(); 
            $table->string('nofak', 150)->nullable();
            $table->string('valid', 150)->nullable();
            $table->string('user', 150); 
           // $table->foreignIdFor(UserController::class);
            $table->string('resource', 150)->nullable(); 
            $table->string('remark', 100)->nullable(); 
            $table->date('month_date');
            $table->string('ip_comp', 100);
            $table->string('current_team_id',2)->nullable();
            $table->string('active',2)->nullable();
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
        Schema::dropIfExists('scans');
    }
};
