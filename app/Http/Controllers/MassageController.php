<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class MassageController extends Controller
{
    public function sendMessage(Request $request){
        DB::insert('insert into messages ( name, email, message) values (?, ?, ?)', [$request->name, $request->email,$request->message]);
      return  back()->with('successful');

    }
}
