<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;

class InfoCustomerController extends Controller
{
    public function getInfo($id){
        $customer = Customer::find($id);
        $orders = Order::where("CusId",$id)->get();
        return view('myaccount',['customer'=>$customer,'orders'=>$orders]);
    }


}
