<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class AuthController extends Controller

{

    //---------LOGIN  CONTROLLER---------\\

    function index()

    {

        return view('login');

    }

    //---------REGISTRATION CONTROLLER---------\\

    function registration()

    {

        return view('registration');
        
    }

    //---------CONTROLLER FOR VALID REGISTRATION AND NEEDED INFORMATION--------\\

    function validate_registration(Request $request)

    {
        
        $request->validate([

            'name'         =>   'required',

            'email'        =>   'required|email|unique:users',

            'password'     =>   'required|min:6'

        ]);

        $data = $request->all();

        User::create([

            'name'  =>  $data['name'],

            'email' =>  $data['email'],

            'password' => Hash::make($this->GetSalting() . $data['password'])

        ]);

        return redirect('login')->with('success', 'Successfully registered');

    }

    //---------CHECKING IF USER INFORMATION IS VALID FOR USER---------\\

    function validate_login(Request $request)

    {

        $request->validate([

            'email' =>  'required',

            'password'  =>  'required'

        ]);

        $credentials = $request->only('email', 'password');

        $credentials["password"] = $this->GetSalting() . $credentials["password"];

        if(Auth::attempt($credentials))

        {
            $request->session()->regenerate();

            return redirect('index');

        }

        return redirect('login')->with('success', 'Invalid Email or Password');

    }

     //---------DASHBOARD CONTROLLER AND PREVENTING UNAUTHENTICATED USERS TO ENTER THE SYSTEM WITH DIRECT ACCESS TO LINKS---------\\

    function dashboard()

    {

        if(Auth::check())

        {

            return view('index');

        }

        return redirect('login')->with('success', 'LOGIN FIRST!!');

    }

    //---------LOG OUT CONTROLLER---------\\

    function logout()

    {

        Session::flush();

        Auth::logout();

        return Redirect('login');

    }

    //------------TO PREVENT ESTIMATION OF PASSWORD------------\\

    private final function GetSalting() 
    
    {
        
        return "v6I1&RjM1";

    }
}