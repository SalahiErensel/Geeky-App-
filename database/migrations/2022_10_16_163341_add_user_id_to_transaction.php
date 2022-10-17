<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration

{

    public function up()

    {

        //----UPDATING TABLES DURING DEVELOPMENT PROCESS------\\

        Schema::table('money_transactions', function (Blueprint $table) 
        
        {

            $table->unsignedBigInteger('user_id')->nullable(false);

            $table->foreign('user_id')->references('id')->on('users');

        });

    }

    public function down()

    {

        Schema::table('money_transactions', function (Blueprint $table) 
        
        {

            
        });

    }

};