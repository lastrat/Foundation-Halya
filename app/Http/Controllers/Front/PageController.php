<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function about()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.pages.about', compact('settings'));
    }

    public function contact()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.pages.contact', compact('settings'));
    }

    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $settings = Setting::all()->pluck('value', 'key')->toArray();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'contact_message' => $request->message,
            'settings' => $settings,
        ];

        Mail::send('emails.contact', $data, function ($message) use ($settings, $data) {
            $message->to($settings['contact_email'] ?? 'contact@halyafoundation.com')
                    ->subject(($settings['site_name'] ?? 'Fondation Halya') . ' - ' . $data['subject']);
            $message->from($settings['site_email'] ?? '_mainaccount@halyafoundation.com', $settings['site_name'] ?? 'Fondation Halya');
        });

        return back()->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
    }

    public function partners()
    {
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('front.pages.partners', compact('partners', 'settings'));
    }
}
