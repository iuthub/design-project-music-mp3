<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Gate;
use App\Music;
use App\User;
use getID3;
use getid3_lib;
use DB;
class AdminPostController extends Controller
{
    public function show(){
        return view('welcome');
    }

    public function create(Request $request, User $user)
    {
        $user= Auth::user();
        $musics= new Music;
        $path = $request->file('file');
        $dastinationPath = public_path('/music');
        $input['name'] =$path->getClientOriginalName();
        $path->move($dastinationPath, $input['name']);

        $getID3 = new getID3;
        $file = 'music/'.$input['name'];
        print_r($file);
        set_time_limit(30);
        $ThisFileInfo = $getID3->analyze($file);
        getid3_lib::CopyTagsToComments($ThisFileInfo);

        $musics->file_path=$file;
        $musics->artist = (!empty($ThisFileInfo['comments_html']['artist']) ? implode('<BR>', $ThisFileInfo['comments_html']['artist']):'&nbsp;');
        $musics->name = (!empty($ThisFileInfo['comments_html']['title']) ? implode('<BR>', $ThisFileInfo['comments_html']['title']):'&nbsp;');
        $musics->genre= (!empty($ThisFileInfo['comments_html']['genre']) ? implode('<BR>', $ThisFileInfo['comments_html']['genre']):'&nbsp;');
        $musics->duration= (!empty($ThisFileInfo['playtime_string']) ? $ThisFileInfo['playtime_string']: '&nbsp;');
        if(isset($ThisFileInfo['comments']['picture'][0])) {
            $Img = 'data:' . $ThisFileInfo['comments']['picture'][0]['image_mime'] . ';charset=utf-8;base64,' . base64_encode($ThisFileInfo['comments']['picture'][0]['data']);
            $musics->img_path=$Img;
        }
        $musics->set_global=1;
        $musics->save();
        $musics->user()->attach($user->id);
        return back() ;
    }

    public  function  edit(Request $request){
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
                ));


            return back();
        }
    }
    public  function  delete(Request $request){
        if (!Auth::check()){
            return redirect('login');
        }elseif(Gate::denies('admin')){
            return redirect('login');
        }
        else {
            DB::update('update musics set  set_global= ? where id = ?', [0, $request->id]);
            return back();
        }
    }
}
