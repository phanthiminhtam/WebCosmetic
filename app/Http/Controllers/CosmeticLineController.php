<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CosmeticLine;
use Illuminate\Http\Request;
use Exception;

class CosmeticLineController extends Controller
{


    public function index()
    {
        $listCats = Category::all(['CatId','CatName']);
        return view('admin.CosmeticLine',['listCats'=>$listCats]);
    }

    public function getPageData(Request $request){
        $searchText = $request->input('searchText', '');
        $pageNumber = $request->input('pageNumber', 1);
        $pageSize = $request->input('pageSize', 5);
        if ($searchText)
        {
            $categories = CosmeticLine::with('category')->where('LineName', 'LIKE', '%' . $searchText . '%')->get();
        }
        else{
            $categories = CosmeticLine::with('category')->get();
        }

        $Data = array_slice($categories->toArray(), ($pageNumber - 1) * $pageSize, $pageSize);
        $TotalCount = count($categories);

        return response()->json([
            'Data' => $Data,
            'TotalCount' =>$TotalCount
        ]);
     }

    public function getById($id){
        $cat = CosmeticLine::find($id);
        return response()->json($cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cat = new CosmeticLine;
        // Gán các giá trị từ request vào các trường tương ứng
        $cat->LineName = $request->input('LineName');
        $cat->CatId = $request->input('CatId');
        $cat->Brand = $request->input('Brand');
        $cat->Origin = $request->input('Origin');
        $cat->save();
        $cat->load('category');
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
     * @param  \App\Models\CosmeticLine  $CosmeticLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $cat = CosmeticLine::findOrFail($id);
            $cat->LineName = $request->input('LineName');
            $cat->CatId = $request->input('CatId');
            $cat->Brand = $request->input('Brand');
            $cat->Origin = $request->input('Origin');
            $cat->save();
            $cat->load('category');
            return response()->json([
                'check' => true,
                'cosmeticline'=>$cat
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
     * @param  \App\Models\CosmeticLine  $CosmeticLine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "";
        $check = true;
        try{
            $cat = CosmeticLine::findOrFail($id);
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
        $cat = CosmeticLine::findOrFail($id);
        $cat->Active = !$cat->Active;
        $cat->save();
    }

}
