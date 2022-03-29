<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Mail\Messages as MailMessages;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\HomeContent;

class MainController extends Controller
{
    public function index()
    {
        // dd(convertWa(getPhone()[0]));
        $slogan = Profile::select('slogan')->first()->pluck('slogan')[0];
        $wwe = HomeContent::whereSection('wwe')->latest()->get();
        $ms = HomeContent::whereSection('ms')->latest()->get();
        $products = Product::latest()->get();
        return view('main.home', compact('products', 'slogan', 'wwe', 'ms'));
    }
    public function about()
    {
        $profile = Profile::select(['visi', 'misi'])->first();
        return view('main.about', compact('profile'));
    }
    public function contact_us()
    {

        $visi = Profile::select('visi')->first()->pluck('visi')[0];
        $contact = Contact::first();

        // $email = Contact::first()->pluck('email')[0];
        // $email = str_replace(array("\r", "\n"), '', $email);
        // $email = collect(explode('<br />', $email))->filter(function ($val) {
        //     return $val != '';
        // })->toArray();
        // dd($email);

        return view('main.contact', compact('visi', 'contact'));
    }

    public function process_messages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }


        $email = Contact::first()->pluck('email')[0];
        $email = str_replace(array("\r", "\n"), '', $email);
        $email = collect(explode('<br />', $email))->filter(function ($val) {
            return $val != '';
        })->toArray();


        Message::create($request->all());

        foreach ($email as $to) {
            Mail::to($to)->send(new MailMessages($request->all()));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank You, Your email has been sended successfully.'
        ]);
    }
}
