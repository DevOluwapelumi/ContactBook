<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function showContact(){
        return view('Contact.register');
    }
    public function addContact(Request $req){


     $newname=time().$req->image->getClientOriginalName();
     $move=$req->image->move(public_path('images/'), $newname);
     if($move){
            $insert=DB::table('contact_table')->insert([
           'title'=>$req->title,
            'content'=>$req->content,
            'user_id'=>Auth::user()->id,
           'user_profile'=>$newname
          ]);
           if($insert) {
                return redirect('/displayContact');
           }
           else {
            return ('Not sent');
           };
     } else {
        return ' not moved';
     }
    //  return $req->image->getSize(); --- To get the image Size
    }

    public function displayContact(){
      //  $select=DB::table('noteapp_table')->get();
        $select=DB::table('contact_table')->where('user_id', Auth::user()->id)->get();
       // return $select;
        return view('Contact.displayContact', [
            'allnote'=>$select
            ]);
}
   
}
