<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginClientController extends Controller
{
    public function registerView(){
        return view('registration');
    }
    public function register(Request $request)
    {
        $message = "";
        $validatedData = $request->validate([
            'Email' => 'required|email|unique:customer',
            'PhoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        if (Customer::where('Email', $request->Email)->exists()) {
            $message = "ExistPhone";
        } else {
            $customer = new Customer();
            $customer->CusName = $request->CusName;
            $customer->PhoneNumber =$request->PhoneNumber;
            $customer->Address =$request->Address;
            $customer->Email = $request->Email;
            $customer->PassWord = $request->PassWord;
            $customer->save();
        }

        return redirect()->route('client.registerView');
    }

    public function loginView(){
        return view('login2');
    }
    public function login(Request $request)
    {
        $customer = Customer::where('Email', $request->Email)->where('PassWord',$request->PassWord)->first();

        if ($customer!=null) {

            $id = $customer->CusId;
            // Set a cookie with id and username
            $cookie = cookie('CustomerId', $id, 525600); // Expires in 1 year
            $cookieName = cookie('CustomerName', $customer->CusName, 525600); // Expires in 1 year
            return redirect()->route('home.index')->withCookies([$cookie,$cookieName]);
        }
        return response()->json([
            'check' => false
        ]);
    }

    public function logout()
    {
        $cookie = Cookie::forget('CustomerId');
        $cookieName = Cookie::forget('CustomerName');
        return redirect()->route('home.index')->withCookies([$cookie,$cookieName]);
    }
}
