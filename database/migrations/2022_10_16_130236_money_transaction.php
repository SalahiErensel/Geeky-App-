<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration

{

    public function up()

    {

        //MONEY TRANSACTIONS TABLE

        Schema::create('money_transactions', function (Blueprint $table) 
        
        {

            $table->id();

            $table->integer('withdrawer')->default(0);
            
            $table->integer('depositer')->default(0);

            $table->integer('amount');

            $table->string('transaction_number');

            $table->timestamps();

        });

    }

    public function down()

    {

        Schema::dropIfExists('money_transactions');

    }

};