<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Sitesetting;
use Illuminate\Http\Request;

class ContactpageController extends Controller
{
    public function index()
    {
        $setting = Sitesetting::find(1);
        return view('contact', compact('setting'));
    }

    public function save(Request $request)
    {
        if ($request->user_id) {
            $userId = $request->user_id;
        } else {
           $userId = '';
        }
        
        ContactMessage::create([
            'name' => $request->name,
            'email'=> $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' => $userId,
        ]);

        return back()->with('message', 'Your message has been recorded !');
    }
}
