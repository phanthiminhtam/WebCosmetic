<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
class ReviewController extends Controller
{
    public function index()
    {
        // $listCus = Customer::all(['CusId','CusName']);
        // return view('admin.Review',['listCus'=>$listCus]);
        $review = Review::all();
        return view('admin.Feedback',['rev' => $review]);
    }

    public function getPageData(Request $request){
        $searchText = $request->input('searchText', '');
        $pageNumber = $request->input('pageNumber', 1);
        $pageSize = $request->input('pageSize', 5);
        if ($searchText)
        {
            $categories = Review::with('customer')->where('CreateDate', 'LIKE', '%' . $searchText . '%')->get();
        }
        else{
            $categories = Review::with('customer')->get();
        }

        $Data = array_slice($categories->toArray(), ($pageNumber - 1) * $pageSize, $pageSize);
        $TotalCount = count($categories);

        return response()->json([
            'Data' => $Data,
            'TotalCount' =>$TotalCount
        ]);
     }

    public function getById($id){
        $cat = Review::find($id);
        return response()->json($cat);
    }

    public function create(Request $request)
    {
        $re = new Review;
        // Gán các giá trị từ request vào các trường tương ứng
        $re->Email = $request->input('Email');
        $re->Content = $request->input('Content');
        $re->Vote = $request->input('Vote');
        $re->CreateDate = date('yy-MM-dd');
        $re->Status = 0;
        $re->PhoneNumber = $request->PhoneNumber;
        $re->CusId = $request->CusId;
        $re->save();
        return response()->json([
            'message' => true,
            'review' => $re
        ]);
        try{

        }
        catch(Exception $e){
            return response()->json([
                'message' => false
            ]);
        }
    }

    public function destroy($id)
    {
        $message = "";
        $check = true;
        try{
            $cat = Review::findOrFail($id);
            $cat->delete();
            $message="Xóa thành công";
        }
        catch(Exception $e){
            $check = false;
            $message = "xóa thất bại";
        }

        return response()->json([
            'message'=>$message,
            'check' =>$check
        ]);
    }

    public function changeStatus($id){
        $cat = Review::findOrFail($id);
        $cat->Status = !$cat->Status;
        $cat->save();
        return response()->json([
            'message' => true
        ]);
    }
    public function storeRV(Request $request)
    {
        $review = new Review();
        $review->Email = $request->Email;
        $review->PhoneNumber = $request->PhoneNumber;
        $review->Content = $request->Content;
        $review->Vote= $request->Vote;
        $review->CreateDate = Carbon::now();
        $review->Status=0;

        $check = Order::where('Email', $request->Email)->first();
        if($check != null)
        {
            $review->CusId = $check->CusId;
            $review->save();
            return response()->json([
                'message' => true,
                'review' => $review
            ]);
        }
        return response()->json([
            'message' => false,

        ]);
    }


}
