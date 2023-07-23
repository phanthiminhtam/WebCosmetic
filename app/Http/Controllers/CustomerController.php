<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login2');
    }

    public function indexAdmin()
    {
        $customer = Customer::all();
        return view('admin.Customer.index',['cus' => $customer]);
    }

    public function check(Request $request)
    {
        $customer = $request->validate([
            'Email' => ['required','Email'],
            'PassWord' => ['required']
        ]);
        if(Auth::attempt($customer))
        {
            return View('index');
        }
        return "<h1>Email hoặc mật khẩu sai</h1>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        customer::create([
            'CusName' => $input['CusName'] ,
            'PhoneNumber' => $input['PhoneNumber'],
            'Address' => $input['Address'],
            'UserName' => $input['UserName'],
            'Email'=> $input['Email'],
            'PassWord' => Hash::make($input['PassWord'])
            // 'PassWord' => $input['PassWord']
        ]);
        return view('login2');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('home2.Customer.index');
    }
}
