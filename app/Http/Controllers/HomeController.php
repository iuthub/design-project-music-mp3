<?php

namespace App\Http\Controllers;
use App\Music;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $popular_songs = (new Music)->where('set_global',[value('1')])->orderBy('played_num', 'desc')->get();
        $new_song= (new Music)->where('set_global',[value('1')])->orderBy('created_at', 'asc')->get();
        return view('index', ['new_song'=>$new_song, 'popular_song'=>$popular_songs]);
    }
}
