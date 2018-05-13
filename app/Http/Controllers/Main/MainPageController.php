<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Music;
use Auth;
class MainPageController extends Controller
{
    public function show(){

        $popular_songs = (new Music)->where('set_global',[value('1')])->orderBy('played_num', 'desc')->get();
        $new_song= (new Music)->where('set_global',[value('1')])->orderBy('created_at', 'asc')->get();

        return view('index', ['new_song'=>$new_song, 'popular_song'=>$popular_songs]);
    }

    public function addToMyPlaylist(Request $request){
        $user= Auth::user();
        $musics= (new Music)->find($request->id);

        if(!($musics->users->contains($user))){
            $musics->user()->attach($user->id);
        }
        return back();
    }
}
