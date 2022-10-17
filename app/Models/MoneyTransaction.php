<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class MoneyTransaction extends Model

 //-----------MONEY TRANSACTION TABLE ATTRIBUTES-----------\\

{

    protected $fillable = [

        'user_id', 'amount', 'transaction_number', 'transactiontype'

    ];
    
    use HasFactory;
    
}
