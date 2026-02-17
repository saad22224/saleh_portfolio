<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);


        $email = Setting::where('key', 'email')->pluck('value_en')->first();
        // CHANGE THIS EMAIL TO YOUR OWN
        Mail::to($email)->send(new ContactMail($data));

        return back()->with('success', __('Thank you! Your message has been sent successfully.'));
    }
}
