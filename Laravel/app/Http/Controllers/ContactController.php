<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return \view('contact');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $contact = new Contact;
        $contact->fill($request->all());
        $contact->save();
        return back()->with('success', 'cảm ơn bạn đã để lại nời nhắn');
    }
    public function saveEmail(Request $req)
    {
        $req->validate([
            'email'=>'required'
        ]);
        $contact = new Contact;
        $contact->email = $req->email;
        $contact->save();
        return \back();
    }
    public function show(){
        $contact = Contact::select('id','email','name','message')->where('name','!=',null)->paginate(10);
        $subscribe = Contact::select('id','email','name')->where('name','=',\null)->get();
        return \view('admin.contact.index', ['contact' => $contact, 'subscribe' => $subscribe]);
    }
}
