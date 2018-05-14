<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Music;
use App\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash;
use getID3;
use getid3_lib;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use DB;
use Validator;
use Hash;
class UserController extends Controller
{
    public function profile(){
        return view('profile');
    }
    public function show_playlist()
    {
        $playlist = Auth::user()->musics;

            return view('profile-playlist', ['playlist' => $playlist,]);

    }
    public function update(User $user, Request $request)
    {
        $user=Auth::user();
        $data =Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
            $user=Auth::user();
            if($request->password==$request->confirmpassword&& !$data->false()){
        $user->update(array(
            'name'=> $request ->name,
            'email'=> $request ->email,
            'password'=>Hash::make($request->password),
        ));
        }
            else{
               return  back()->with($data->errors()->add('field', 'wrong input data'));
            }
        return back();
    }
    public function musicUpload(Request $request, User $user)
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
        $musics->save();
        $musics->user()->attach($user->id);
        return back() ;
    }
    public function makeSuggest(Request $request){

        DB::update('update musics set  suggested= ? where id = ?', [1, $request->id]);

        return  ;
        }
    public function unlike(Request $request){
        $user= Auth::user();
        $musics= (new Music)->find($request->id);
        $musics->user()->detach($user->id);
        return  back();
    }

}
