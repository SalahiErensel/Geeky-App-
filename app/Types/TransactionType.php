<?php

namespace App\Types;

//------CREATING AN ENUM IN TYPE THAT DECIDES IF REQUEST IS WITHDRAW,MAKES TRANSACTION TYPE=0,ELSE TRANSACTION TYPE=1

enum TransactionType:int 

{

    case WITHDRAW = 0;

    case DEPOSIT = 1;
    
}