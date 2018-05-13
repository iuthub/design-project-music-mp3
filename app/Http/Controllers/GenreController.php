<?php

namespace App\Http\Controllers;
use App\Music;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function rock(){
        $songs= (new Music)->orWhere('genre', 'like', '%Rock%')->get();
        return view('genre', ['songs'=>$songs]);
    }
    public function classical(){
        $songs= (new Music)->orWhere('genre', 'like', '%Classic%')->get();
        return view('genre', ['songs'=>$songs]);
    }
    public function pop(){
        $songs= (new Music)->orWhere('genre', 'like', '%Pop%')->get();
        return view('genre', ['songs'=>$songs]);
    }
    public function rap(){
        $songs= (new Music)->orWhere('genre', 'like', '%Rap%')->get();
        return view('genre', ['songs'=>$songs]);
    }
    public function jazz(){
        $songs= (new Music)->orWhere('genre', 'like', '%Jazz%')->get();
        return view('genre', ['songs'=>$songs]);
    }
}
