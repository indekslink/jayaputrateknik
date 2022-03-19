<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $mail = Message::count();
        // $last_mail = Message::latest()->limit(3)->get();
        $products = Product::count();
        $messages = Message::latest()->paginate(10);
        return view('admin.dashboard', compact('mail', 'products', 'messages'));
    }

    public function profile()
    {
        $profile = collect(Profile::select(['visi', 'misi', 'slogan'])->first())->map(function ($val) {
            return str_replace("<br />", "", $val);
        });
        $profile = (object) $profile->all();

        return view('admin.profile', compact('profile'));
    }
    public function contact()
    {
        $contact = collect(Contact::select(['email', 'address', 'phone'])->first())->map(function ($val) {
            return str_replace("<br />", "", $val);
        });
        $contact = (object) $contact->all();


        return view('admin.contact', compact('contact'));
    }

    public function process_profile(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'visi' => 'sometimes|required',
            'misi' => 'sometimes|required',
            'slogan' => 'sometimes|required',
        ]);



        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validate->errors(),
                'key' => $request->keys()
            ]);
        }

        //modify all value
        $req = collect($request->all())->map(function ($val) {
            return nl2br($val);
        });

        Profile::updateOrCreate(
            [
                'id' => 1
            ],
            $req->toArray()
        );
        $msg = Str::ucfirst($request->keys()[0]) . ' berhasil diupdate';
        return response()->json([
            'status' => 'success',
            'msg' => $msg
        ]);
    }
    public function process_contact(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'address' => 'sometimes|required',
            'phone' => 'sometimes|required',
            'email' => 'sometimes|required',
        ]);



        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validate->errors(),
                'key' => $request->keys()
            ]);
        }

        //modify all value
        $req = collect($request->all())->map(function ($val) {
            return nl2br($val);
        });

        Contact::updateOrCreate(
            [
                'id' => 1
            ],
            $req->toArray()
        );
        $msg = Str::ucfirst($request->keys()[0]) . ' berhasil diupdate';
        return response()->json([
            'status' => 'success',
            'msg' => $msg
        ]);
    }
}
