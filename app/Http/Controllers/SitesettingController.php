<?php

namespace App\Http\Controllers;

use App\Models\Sitesetting;
use Illuminate\Http\Request;

class SitesettingController extends Controller
{
    public function index()
    {
        $setting = Sitesetting::find(1);
        return view('backend.admin.setting.index', compact('setting'));
    }

    public function save(Request $request)
    {
        $setting = Sitesetting::find(1);

        $setting->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'mail' => $request->mail,
            'fb' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube'=> $request->youtube,
            'linkedin' => $request->linkedin,
        ]);

        return back()->with('message', 'Setting Saved !');
    }
}
