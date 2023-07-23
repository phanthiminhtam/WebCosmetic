<?php

namespace App\Http\Controllers;

use App\Models\CosmeticLine;
use App\Models\Product;
use App\Models\Specificproduct;
use Illuminate\Http\Request;
use Exception;
class ProductController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $listPros = CosmeticLine::all(['LineId','LineName']);
        return view('admin.Product',['listPros'=>$listPros]);
    }

    public function chitietSP($id)
    {
        // $specificProduct = Specificproduct::with('product')->where('ProId',$id)->get();
        // $specificProduct = Product::with('specificproduct')->where('ProId',$id)->get();
        $specificProduct = Specificproduct::with('product.cosmeticline')->where('ProId',$id)->first();
        // $specificProduct2 = Product::with('specificproduct')->where('ProId',$id)->first();

        // dd($specificProduct2);
        return view('admin.ProductDetail',compact('specificProduct'))
        ;
    }

    public function getPageData(Request $request){
        $searchText = $request->input('searchText', '');
        $pageNumber = $request->input('pageNumber', 1);
        $pageSize = $request->input('pageSize', 5);
        if ($searchText)
        {
            $categories = Product::with('cosmeticline')->where('ProName', 'LIKE', '%' . $searchText . '%')->get();
        }
        else{

            $categories = Product::with('cosmeticline')->get();
         //chuyển all
        }

        $Data = array_slice($categories->toArray(), ($pageNumber - 1) * $pageSize, $pageSize);
        $TotalCount = count($categories);

        return response()->json([
            'Data' => $Data,
            'TotalCount' =>$TotalCount
        ]);
     }

    public function getById($id){
        $cat = Product::find($id);
        return response()->json($cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cat = new Product;
        // Gán các giá trị từ request vào các trường tương ứng
        $cat->ProName = $request->input('ProName');
        $cat->LineId = $request->input('LineId');
        $cat->Description = $request->input('Description');
        $cat->save();
        $cat->load('cosmeticline');
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
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $cat = Product::findOrFail($id);
            $cat->ProName = $request->input('ProName');
            $cat->LineId = $request->input('LineId');
            $cat->Description = $request->input('Description');
            $cat->save();
            $cat->load('cosmeticline');
            return response()->json([
                'check' => true,
                'product'=>$cat
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'check' => false
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "";
        $check = true;

            $cat = Product::findOrFail($id);
            $cat->delete();
            $message="Xóa thành công";
        return response()->json([
            'message'=>$message,
            'check' =>$check
        ]);
    }


    public function ListSearch($keyword)
    {
            return Specificproduct::WhereHas('product', function($query) use ($keyword){
                $query->Where('ProName', 'like', '%' . $keyword . '%')->get()->map(function($item){
                    return new SpecificProduct([
                        'Product' => new Product(['ProName' => $item->product->ProName]),


                            'SpId' => $item->SpId
                    ]);
            })->all();
        });
    }

    public function ListName($s){
        // if($request->get('query')){
        //     $query=$request->get('query');
        //     $data=DB::table('specificproduct')->with('product')->where('ProName','LIKE',"%($query)$")->get();
        // }
        $data = $this->ListSearch($s);
        return response()->json([
            'data'=>$data,
            'message' => true,
        ]);
    }
}
