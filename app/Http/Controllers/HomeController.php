<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use App\Types\TransactionType;

use App\Models\MoneyTransaction;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{

    //---------HOME PAGE CONTROLLER--------\\

    public function index()

    {

        $allCustomers = User::all();

        return view('index', compact('allCustomers'));

    }

    //---------CUSTOMER DETAILS CONTROLLER---------\\

    public function customerDetail($id)

    {

         //--------GETS THE USER ID OF CUSTOMER  AND SHOWS DETAILS LIKE NAME ,EMAIL , BALANCE ---------\\
        
        $customerData = User::find($id);

        $allCustomers = User::all();

        return view('customerDetail', compact('customerData', 'allCustomers'));

    }

    //---------WITHDRAW REQUEST CONTROLLER---------\\

    public function withdrawProcess(Request $request)

    {

         //--------GETS THE USER ID OF CUSTOMER WHO REQUESTS WITHDRAW-------------\\
        
        $user_id = Auth::id();

       //-------- GETS CUSTOMER'S BALANCE--------\\
        
        $current_balance = User::where('id', $user_id)->first()->balance;

        //----------CONDITION AND PROCESS TO WITHDRAW MONEY---------\\

        if($request->amount_val < 500 and $current_balance>1) 
        
        {

            $transaction = MoneyTransaction::create([

                "user_id" => $user_id,

                "transaction_number" =>  mt_rand(1000000000, 9999999999),

                "amount" => $request->amount_val,

                "transactiontype" => TransactionType::WITHDRAW

            ]);

            //---------CAN NOT WITHDRAW MORE THAN 500--------\\

            if($request->amount_val>500)
            
            {

                return redirect()->route('index');

            }

            //-----------UPDATING BALANCE OF CUSTOMER AFTER WITHDRAW PROCESS-----------\\

            if($transaction) 
            
            {

                $new_balance = $current_balance - $request->amount_val;

                User::where('id', $user_id)->update([

                    "balance" => $new_balance]);
                    
            }

        return redirect()->route('index');

    }

}

    //---------DEPOSIT REQUEST CONTROLLER---------\\

    public function depositProcess(Request $request)

    {

        //---------GETS THE USER ID OF CUSTOMER WHO REQUESTS DEPOSIT AND SHOWS THE CURRENT BALANCE---------\\
        
        $user_id = Auth::id();

        $current_balance = User::where('id', $user_id)->first()->balance;

        //---------DEPOSIT PROCESS---------\\

        if($request->amount_val > 0) 
        
        {

            $transaction = MoneyTransaction::create([

                "user_id" => $user_id,

                "transaction_number" =>  mt_rand(1000000000, 9999999999),

                "amount" => $request->amount_val,

                "transactiontype" => TransactionType::DEPOSIT

            ]);

            if($transaction) 
            
            {

                 //-----------UPDATING BALANCE OF CUSTOMER AFTER DEPOSITPROCESS-----------\\

                $new_balance = $current_balance + $request->amount_val;

                User::where('id', $user_id)->update([

                    "balance" => $new_balance]);

            }

        }
    
       return redirect()->route('index');

    }

}