<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        Mail::to('jeremy.caron.labalette@gmail.com')
            ->send(new Contact($request->except('_token')));

        return view('confirm');
    }
}
