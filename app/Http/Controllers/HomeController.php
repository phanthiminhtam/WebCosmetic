<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Specificproduct;
use App\Models\Staff;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function welcome(){
        return View("welcome");
    }

    public function thongKeDonHang()
    {
        $orders = DB::table('order')
        ->selectRaw('DATE(created_at) as order_date, COUNT(*) as total_orders, SUM(MoneyTotal) as total_money')
        ->groupBy('order_date')
        ->get();

        return view('admin.thongke', compact('orders'));
    }

    public function ThongKe(){
        $listPro = Product::all();

        $listSale = Specificproduct::where('Offer','!=',0)->get();
        $listTopSale = Specificproduct::with('product')->where('Offer','!=',0)->limit(8)->get();

        $listContact = Contact::all();
        $listStaff = Staff::all();
        $listReview = Review::all();
        $listOrd = Order::all();
        $tg=0;
        foreach($listOrd as $item)
        {
            // dd($listOrd);
            if($item->Status == 'DG')
            {
                $tg += $item->MoneyTotal;
            }

        }
        return view('admin.index',compact('listPro','listSale','listOrd','listTopSale','tg','listContact','listStaff','listReview'));
    }

    public function search($id){
        if($id!=""){
            $list = Specificproduct::with("product")->whereHas('product', function ($query) use ($id) {
                $query->where("ProName", "LIKE", "%" . $id . "%");
            })->get();
        }
        else{
            $list = [];
        }

        return response()->json(['list'=>$list]);
    }
}
