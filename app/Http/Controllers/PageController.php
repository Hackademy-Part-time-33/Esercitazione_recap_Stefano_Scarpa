<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function homepage(){
        return view('homepage');
    }

    public function contact(){
        return view('contact');
    }


    public function send(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'nome' => $request->fullname,
            'indirizzo' => $request->input('email'),
            'messaggio' => $request->message,
        ];

        Mail::to('test@test.it')->send(new SendMail($data));
        return redirect()->route('homepage');
    }
}
