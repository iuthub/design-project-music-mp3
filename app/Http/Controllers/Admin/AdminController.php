<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\AuthServiceProvider;
use Auth;
use Gate;
use App\Messages;
use App\Music;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        if (!Auth::check()){
            return redirect('login');
        }elseif (Gate::denies('admin')){
            return redirect('login');
        }
        else {

            return view('admin.profile');
        }
    }

    public  function  showMessages(){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{
            $messages = Messages::all(['*']);
            return view('admin.message', ['messages'=>$messages]);
        }
    }

    public  function  showSuggested(){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{
            $suggests= (new Music)->where('suggested',[value('1')])->get();
            $counter=1;
            return view('admin.suggest', ['suggests'=>$suggests, 'counter'=>$counter]);
        }
    }
    public  function  showSuggestedEdit($id){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{
            $suggests= (new Music)->where('suggested',[value('1')])->get();
            $counter=1;
            return view('admin.suggest', ['suggests'=>$suggests, 'counter'=>$counter]);
        }
    }
    public  function  showMusic(){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{
            $musics= (new Music)->where('set_global',[value('1')])->get();
            $counter=1;
            return view('admin.music', ['musics'=>$musics, 'counter'=>$counter]);
        }
    }
    public  function  showUsers(){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{
            $users= User::all();
            $counter=1;
            return view('admin.users',['users'=>$users, 'counter'=>$counter]);
        }
    }

    public  function  showProfile(){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else{
            return view('admin.profile');
        }
    }

}
