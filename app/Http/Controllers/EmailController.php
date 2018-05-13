<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller{

    public function send(Request $request){

        $username = $request->input('username');
        $status = $request->input('status');
        $to = 'ilkhom98@mail.ru';

        Mail::send('emails.send', ['username' => $username, 'status' => $status], function ($message)use($to){

            $message->from('iutmusic.mp3@mail.ru', 'Music MP3');
            $message->to($to);
            $message->subject('Suggest status');
        });
        return response()->json(['message' => 'Request completed']);
    }

}