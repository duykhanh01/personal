<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.\
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(request $reg)
    {
        $data = request()->validate([
            'contact-name' => 'required',
            'contact-email' => 'required|email',
            'contact-phone',
            'contact-message' => 'required',
        ]);
        Mail::to('ndkhanh1325@gmail.com')->send(new ContactMail($data));
        return back()->with('msg-success', 'Tin nhắn của anh/chị đã được gửi thành công, cảm ơn anh/chị đã liên hệ');
    }
}
