<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration

{

    public function up()

    {

        //------UPDATING TABLES DURING DEVELOPMENT PROCESS-------\\

        Schema::table('money_transactions', function (Blueprint $table) 
        
        {

            $table->dropColumn('depositer');

            $table->dropColumn('withdrawer');

            $table->integer('transactiontype')->nullable(false);

        });

    }

    public function down()

    {

        Schema::table('money_transactions', function (Blueprint $table) 
        
        {
        
            
        });

    }

};