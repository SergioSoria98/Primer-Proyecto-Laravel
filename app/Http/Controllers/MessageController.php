<?php

namespace App\Http\Controllers;


use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $message)
    {
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);

        Mail::to('descobic1998@gmail.com')->send(new MessageReceived($message));

        

        return 'Mensaje enviado';
    }
}