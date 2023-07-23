<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function providerList()
    {
        $provider = Provider::all();
        return view('admin.Provider.index',['provider'=>$provider]);

    }
    public function index()
    {
        $provider = Provider::all();
        return view('admin.Provider.index',['provider'=>$provider]);
    }
    public function create()
    {
        return view('admin.Provider.create');
    }
    public function store(Request $res)
    {
        $validatedData = $res->validate([
            'Email' => 'required|email|unique:customer',
            'PhoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        $p = new Provider();
        $p->PrvName = $res->PrvName;
        $p->Address = $res->Address;
        $p->PhoneNumber = $res->PhoneNumber;
        $p->Email=$res->Email;
        $p->save();
        return redirect()->route('home2.Provider.index')->withErrors([
            'PhoneNumber' => 'Số điện thoại không hợp lệ!',
            'Email'=>'Email không hợp lệ']);
    }

    public function edit($id)
    {
        $db=Provider::find($id);
        return View('admin.Provider.edit',['pr'=>$db]);
    }

     public function save(Request $res,$id)
    {
        $validatedData = $res->validate([
            'Email' => 'required|email|unique:customer',
            'PhoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        $p= Provider::find($id);
        $p->PrvName = $res->PrvName;
        $p->Address = $res->Address;
        $p->PhoneNumber = $res->PhoneNumber;
        $p->Email=$res->Email;
        $p->save();
        return redirect()->route('home2.Provider.index')->withErrors([
            'PhoneNumber' => 'Số điện thoại không hợp lệ!',
            'Email'=>'Email không hợp lệ']);;
    }

    public function destroy($id)
    {
        Provider::find($id)->delete();
        return redirect()->route('home2.Provider.index');
    }
}
