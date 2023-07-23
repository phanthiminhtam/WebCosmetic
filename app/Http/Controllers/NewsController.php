<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function newsList()
    {
        $news = News::all();
        return view('admin.News.index',['news'=>$news]);
    }
    public function index()
    {
        $news = News::all();

        $news->transform(function ($item) {
            $item->PublicDate = Carbon::parse($item->PublicDate);
            return $item;
        });

        return view('admin.News.index', ['news' => $news]);
    }

    public function NewList()
    {
        $news = News::take(6)->get();
        return view('new',['news'=>$news]);
    }

    public function detail($id)
    {
        $new = News::find($id);
        // dd($new);
        return view('chitietBV',compact('new'));
    }

    public function create()
    {
        return view('admin.News.create');
    }
    public function store(Request $res)
    {
        $new = new News();
        $new->Title = $res->Title;
        $new->Content = $res->Content;
        $new->UserId = $res->UserId;
        $new->PublicDate=$res->PublicDate;
        $new->Image=$res->Image;
        $new->save();
        return redirect()->route('home2.News.index');
    }

    public function edit($id)
    {
        $db=News::find($id);
        return View('admin.News.edit',['sp'=>$db]);
    }

     public function save(Request $res,$id)
    {
        $new= News::find($id);
        $new->Title = $res->Title;
        $new->Content = $res->Content;
        $new->UserId = $res->UserId;
        $new->PublicDate=$res->PublicDate;
        $new->Image=$res->Image;
        $new->save();
        return redirect()->route('home2.News.index');
    }

    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->route('home2.News.index');
    }
}
