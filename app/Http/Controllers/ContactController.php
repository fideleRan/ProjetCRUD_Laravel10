<?php

namespace App\Http\Controllers;

use App\Events\UserContactEvent;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    { 
        return view('contact.create');
    }

    public function store()
    {
        $data_contact = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'comment' => 'required'
        ]);
        
        Mail::to('demo1@test.com')->Send(new ContactEmail($data_contact));
        $alert = 'Your comment has been sent successfully';
        session()->flash('Message',$alert);
        return redirect('contact/create');
    }
}
