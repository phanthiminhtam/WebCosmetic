<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CosmeticLine;
use App\Models\Product;
use App\Models\Specificproduct;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\News;
use PhpParser\Node\Expr\Cast;
use App\Models\Review;

class SpecificproductController extends Controller
{

    public function spList()
    {
        $month = Carbon::now()->month;

        $month2 = Carbon::now()->month-3;

        $specificproduct = SpecificProduct::with('product')->whereMonth('StartedDate',$month)
        ->where('Offer',0)->limit(8)->get();

        $specificproduct2 = SpecificProduct::with('product')->where('Offer','!=',0)->limit(8)->get();

        $specificproduct3 = SpecificProduct::with('product')->whereMonth('StartedDate','<=',$month2)->limit(12)->get();

        $news = News::take(4)->get();


        return view('index', compact('specificproduct','specificproduct2','specificproduct3','news'));
    }

    public function loaiSP($id)
    {
        $cat = Category::find($id);

        $idCategory = SpecificProduct::find($id)->product->cosmeticline->CatId;


        $list = SpecificProduct::whereHas('product.cosmeticline', function ($query) use ($idCategory) {
            $query->where('CatId', $idCategory);
        })->limit(12)->orderByDesc('ProId')->get();

        // dd($list);

        return view('loaimypham', compact('list'));
    }


    public function chitietSP($id)
    {
        $reviews = Review::with('customer')->get();
        $specificProduct = SpecificProduct::find($id);

        $idCategory = SpecificProduct::find($id)->product->cosmeticline->CatId;
        $list = SpecificProduct::whereHas('product.cosmeticline', function ($query) use ($idCategory) {
            $query->where('CatId', $idCategory);
        })->limit(8)->orderByDesc('ProId')->get();

        return view('productdetail', compact('reviews','specificProduct', 'list'));
    }

    public function index()
    {
        $listSP = Product::all(['ProId','ProName']);
        return view('admin.Specificproduct',['listSP' => $listSP]);
    }

    public function getPageData(Request $request){
        $searchText = $request->input('searchText', '');
        $pageNumber = $request->input('pageNumber', 1);
        $pageSize = $request->input('pageSize', 5);
        if ($searchText)
        {
            $categories = Specificproduct::with('product')->where('ProName', 'LIKE', '%' . $searchText . '%')->get();
        }
        else{
            $categories = Specificproduct::with('product')->get();
        }

        $Data = array_slice($categories->toArray(), ($pageNumber - 1) * $pageSize, $pageSize);
        $TotalCount = count($categories);

        return response()->json([
            'Data' => $Data,
            'TotalCount' =>$TotalCount
        ]);
     }

    public function getById($id){
        $cat = Specificproduct::find($id);
        return response()->json($cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $objectData = json_decode($request->sp);
        $cat = new Specificproduct;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(40) . '.' . $extension;
            $file->storeAs('public/uploads/Specificproduct', $fileName);
            $cat->Image = $fileName;
        }
        if ($request->hasFile('file1')) {
            $file = $request->file('file1');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(40) . '.' . $extension;
            $file->storeAs('public/uploads/Specificproduct', $fileName);
            $cat->Image1 = $fileName;
        }
        if ($request->hasFile('file2')) {
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(40) . '.' . $extension;
            $file->storeAs('public/uploads/Specificproduct', $fileName);
            $cat->Image2 = $fileName;
        }
        // Gán các giá trị từ request vào các trường tương ứng
        $cat->ProId = $objectData->ProId;
        $cat->Measure = $objectData->Measure;
        $cat->Type = $objectData->Type;
        $cat->Price = $objectData->Price;
        // $cat->StartedDate = date('Y-m-d H:i:s');
        // $cat->StopDate=date('Y-m-d H:i:s');
        $cat->StartedDate = Carbon::parse($objectData->StartedDate) ;
        $cat->StopDate = Carbon::parse($objectData->StopDate);
        $cat->Offer = $objectData->Offer;

        $cat->save();
        $cat->load('product');
        return response()->json([
            'message' => true,
            'cat' => $cat
        ]);
        try{

        }
        catch(Exception $e){
            return response()->json([
                'message' => false
            ]);
        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specificproduct  $Specificproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $cat = Specificproduct::findOrFail($id);
            $cat->Image = $request->input('Image');
            $cat->ProId = $request->input('ProId');
            $cat->Measure = $request->input('Measure');
            $cat->Type = $request->input('Type');
            $cat->Price = $request->input('Price');
            $cat->StartedDate = $request->input('StartedDate');
            $cat->StopDate = $request->input('StopDate');
            $cat->Offer = $request->input('Offer');
            $cat->Image1 = $request->input('Image1');
            $cat->Image2 = $request->input('Image2');
            $cat->save();
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specificproduct  $Specificproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "";
        $check = true;
        try{
            $cat = Specificproduct::findOrFail($id);
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

    public function addToCart($id){
        $specificproduct = Specificproduct::with('product')->find($id);
        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                "SpId" =>$id,
                "ProId" =>$specificproduct->ProId,
                "ProName" => $specificproduct->product->ProName,
                "Image" => $specificproduct->Image,
                "Price" => $specificproduct->Price,
                "Offer" => $specificproduct->Offer,
                "quantity"=>1
            ];
        }

        session()->put('cart',$cart);

        return redirect()->back()->with('success','Thêm sản phẩm vào giỏ hàng thành công!');
    }

    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Đã xoá mỹ phẩm thành công!');
        }
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]= $request->quantity;

                session()->put('cart',$cart);

            session()->flash('success','Đã cập nhật mỹ phẩm thành công!');
        }
    }


    public function addToWishList($id){
        $specificproduct = Specificproduct::with('product')->find($id);
        $cart_wl = session()->get('cartWL',[]);

        if(isset($cart_wl[$id])){
            $cart_wl[$id]['quantity']++;
        }else{
            $cart_wl[$id]=[
                "SpId" =>$id,
                "ProId" =>$specificproduct->ProId,
                "ProName" => $specificproduct->product->ProName,
                "Image" => $specificproduct->Image,
                "Price" => $specificproduct->Price,
                "Offer" => $specificproduct->Offer,
                "quantity"=>1
            ];
        }

        session()->put('cartWL',$cart_wl);

        return redirect()->back()->with('success','Thêm sản phẩm yêu thích thành công!');
    }

    public function removeWL(Request $request)
    {
        if($request->id){
            $cart_wl = session()->get('cartWL');
            if(isset($cart_wl[$request->id])){
                unset($cart_wl[$request->id]);
                session()->put('cartWL',$cart_wl);
            }
            session()->flash('success','Đã xoá mỹ phẩm thành công!');
        }
    }

}

