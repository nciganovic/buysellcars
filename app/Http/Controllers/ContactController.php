<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends MyBaseController
{
    public function get_contact()
    {
        return view("main.contact", $this->data);
    }

    public function post_contact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:5|max:100',
            'message' => 'min:5',
        ]);

        $this->data['mail_result'] = 1;

        Mail::send('main.contact', $this->data, function($message) use ($request) {
            $message->from($request->email, "Web Application");

            $message->to("nciganovic99@gmail.com", "")
                ->subject($request->subject);

        });
    }
}
