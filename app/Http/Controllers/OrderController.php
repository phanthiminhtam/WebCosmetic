<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('Status','DXT')->get();
        return view('admin.Order.index',['orders' => $order]);
    }

    public function index1()
    {
        $order = Order::where('Status','CVC')->get();
        return view('admin.Order.index1',['orders' => $order]);
    }

    public function index2()
    {
        $order = Order::where('Status','DG')->get();
        return view('admin.Order.index2',['orders' => $order]);
    }
    public function detail($id)
    {
        $order = Order::with('orderdetail')->Where('OrdId',$id)->first();
        return view('admin.Order.detail',['list' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function checkoutview(Request $request){
        $customer = null;
        if($request->hasCookie('CustomerId')){
            $customer = Customer::find($request->cookie('CustomerId'));
        }

        return view('checkout',['customer'=>$customer]);
    }

    public function checkout(Request $request)
    {
       $id=0;
        $validatedData = $request->validate([
            'CusName' => 'required|max:100',
            'Email' => 'required|email',
            'PhoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    //    dd($request);
    //    $customer = new Customer();
       $order = new Order();
       $cart = session()->get('cart');

            $order->PhoneNumber = $request->PhoneNumber;
            $order->ReceivingAddress = $request->ReceivingAddress;
            $order->OrderDate=Carbon::now();
            $order->Status = 'DXT';
            $order->CusId=$request->CusId;
            $order->Note=$request->Note;
            $order->Email=$request->Email;
            $order->Payment=$request->Payment;
            foreach($cart as $item)
            {
                if($item['Offer']!=0)
                {
                    $order->MoneyTotal += ($item['Price']*$item['quantity'])-($item['Price']*$item['quantity']*$item['Offer']);
                }
                else
                {
                    $order->MoneyTotal +=($item['Price']*$item['quantity']);
                }
            }
            $order->save();
            // dd($order->OrdId);
             //dd($cart);
            foreach($cart as $item)
            {
                //dd($item);
                $sp = new Orderdetail;
                $sp->OrdId = $order->OrdId;
                $sp->SpId = $item['SpId'];
                $sp->Price = $item['Price'];
                $sp->Quantity = $item['quantity'];
                //dd($sp);
              $sp->save();
            }

       return response()->json(['id'=>$order->OrdId]);

    }

    public function showSucessfull($id){
        return view('successfull',['id'=>$id]);
    }

    public function successfull($id)
    {


        $list=Order::with('orderdetail.specificproduct.product')->where('OrdId',$id)->first();

        // dd($list);
        return view('chitietdonhang',['list'=>$list]);
    }

    public function ChangeStatus($id)
    {
        $order = Order::find($id);
        if($order->Status == "DXT")
        {
            $order->Status = "CVC";
            $order->save();
            return response()->json([
                'message' => true
            ]);
        }
        else if($order->Status == "CVC")
        {
            $order->Status = "DG";
            $order->save();
            return response()->json([
                'message' => true
            ]);
        }
        return true;
    }
}
