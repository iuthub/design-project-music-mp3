<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Music;
use Illuminate\Support\Facades\Response;
use function MongoDB\BSON\toJSON;
use Mail;

class AdminUpdateController extends Controller
{

    public  function  setGlobal(Request $request){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{

            DB::table('musics')
                ->where('id', $request->music_id)
                ->update(array('artist' => $request->artist,
                    'genre'=> $request ->genre,
                    'name'=> $request ->title,
                    'set_global'=>1,
                    'suggested'=>0,
                ));
            $user= (new Music)->find($request->music_id)->user()->get();

            $to=$user->email;
            Mail::send('emails.send', ['username' => $user->name, 'status' => "Approved"], function ($message)use($to){

                $message->from('iutmusic.mp3@mail.ru', 'Music MP3');
                $message->to($to);
                $message->subject('Suggest status');
            });
            return back();
        }
    }

    public  function  suggestDelete(Request $request){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else {
            DB::update('update musics set  suggested= ? where id = ?', [0, $request->id]);
            $user= (new Music)->find($request->music_id)->user()->get();
            $to=$user->email;
            Mail::send('emails.send', ['username' => $user->name, 'status' => 'Rejected'], function ($message)use($to){
                $message->from('iutmusic.mp3@mail.ru', 'Music MP3');
                $message->to($to);
                $message->subject('Suggest status');
            });
            return back();
        }
    }


    public  function  suggestedMusic(Request $request){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else {
            $music = (new Music)->find($request->id);
            //ToDo Email sander
            return response($music->toArray());
        }
    }
}
