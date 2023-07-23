<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class StaffController extends Controller
{
    public function index()
    {
        $listStaffs = Staff::all();
        return view('admin.Staff',['listStaffs'=>$listStaffs]);
    }

    public function getPageData(Request $request){
        $searchText = $request->input('searchText', '');
        $pageNumber = $request->input('pageNumber', 1);
        $pageSize = $request->input('pageSize', 5);
        if ($searchText)
        {
            $categories = Staff::where('StaffName', 'LIKE', '%' . $searchText . '%')->get();
        }
        else{
            $categories = Staff::all();
        }

        foreach($categories as $item){
            $item->StartDate = \Carbon\Carbon::today()->toDateTimeString();
            $startDate = new \DateTime($item->StartDate);
            $formattedDate = $startDate->format('d/m/Y');
            $item->StartDate = $formattedDate;
        }

        $Data = array_slice($categories->toArray(), ($pageNumber - 1) * $pageSize, $pageSize);
        $TotalCount = count($categories);

        return response()->json([
            'Data' => $Data,
            'TotalCount' =>$TotalCount
        ]);
     }
    public function getById($id){
        $cat = Staff::find($id);
        // dd($cat);
        return response()->json($cat);
    }
    public function create(Request $request)
    {
        $s = new Staff;
        // Gán các giá trị từ request vào các trường tương ứng
        $s->StaffName = $request->input('StaffName');
        $s->Address = $request->input('Address');
        $s->PhoneNumber = $request->input('PhoneNumber');
        $s->Post = $request->input('Post');
        $s->Email=$request->Email;
        $s->BasicSalary = $request->input('BasicSalary');
        $s->StartDate = Carbon::parse($request->StartedDate);
        $s->TypeWork = $request->TypeWork;
        $s->ContractWork = $request->input('ContractWork');
        $s->save();

        // $s->StartDate = \Carbon\Carbon::today()->toDateTimeString();
        $startDate = new \DateTime($s->StartDate);
        $formattedDate = $startDate->format('d/m/Y');
        $s->StartDate = $formattedDate;
        return response()->json([
            'message' => true,
            'staff' => $s
        ]);
        try{

        }
        catch(Exception $e){
            return response()->json([
                'message' => false
            ]);
        }
    }
    public function update(Request $request, $id)
    {

        try{
            $s = Staff::findOrFail($id);
            $s->StaffName = $request->input('StaffName');
            $s->Address = $request->input('Address');
            $s->PhoneNumber = $request->input('PhoneNumber');
            $s->Post = $request->input('Post');
            $s->Email=$request->Email;
            $s->BasicSalary = $request->BasicSalary;
            $s->StartDate = Carbon::parse($request->StartedDate);
            $s->ContractWork = $request->input('ContractWork');
            $s->save();
            $s->StartDate = \Carbon\Carbon::today()->toDateTimeString();
            $startDate = new \DateTime($s->StartDate);
            $formattedDate = $startDate->format('d/m/Y');
            $s->StartDate = $formattedDate;
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    public function destroy($id)
    {
        $message = "";
        $check = true;
        try{
            $cat = Staff::findOrFail($id);
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
}
