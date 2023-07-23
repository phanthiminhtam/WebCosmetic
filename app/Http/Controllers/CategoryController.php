<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CosmeticLine;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function categoryList()
    {
        $category = Category::all();
        return view('index',['cats' => $category]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.Category.index',['cats' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $res)
    {
        $cat = new Category();
        $cat->CatName = $res->CatName;
        $cat->Description=$res->Content;
        // dd($res->Description);
        $cat->save();
        return redirect()->route('home2.Category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $res)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db=Category::find($id);
        return View('admin.Category.edit',['sp'=>$db]);
    }

     public function save(Request $res,$id)
    {
        $cat= Category::find($id);
        $cat->CatName = $res->CatName;
        $cat->Description=$res->Description;
        $cat->save();
        return redirect()->route('home2.Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('home2.Category.index');
    }
}
