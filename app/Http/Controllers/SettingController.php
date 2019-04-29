<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('setting.setting')->with(['settings' => Setting::first()]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "blogname" => "required",
            "blogemail" => "required",
            "blogphone" => "required",
            "blogaddress" => "required",
        ]);

        $setting = Setting::first();
        $setting->blog_name = $request->blogname;
        $setting->blog_email = $request->blogemail;
        $setting->blog_phone = $request->blogphone;
        $setting->blog_address = $request->blogaddress;

        $setting->save();

        return redirect()->back();
    }
}
