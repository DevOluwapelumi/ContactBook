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
    if ($req->hasFile('image') && $req->file('image')->isValid()) {
        $newname = time() . $req->file('image')->getClientOriginalName();
        $move = $req->file('image')->move(public_path('images/'), $newname);
        if ($move) {
            $insert = DB::table('contact_table')->insert([
                 'user_id' => Auth::user()->id,
                'full_name' => $req->fullname,
                'phone_number' => $req->phonenumber,
                'email' => $req->email,
                'gender' => $req->gender,
                'address' => $req->address,
                'password' => $req->password,
                'user_profile' => $newname
            ]);
            if ($insert) {
                return redirect('/displayContact');
            } else {
                return 'Not sent';
            }
        } else {
            return 'not moved';
        }
    } else {
        return 'No file uploaded';
    }
}


public function displayContact()
{
    $user = Auth::user();
    if ($user) {
        $select = DB::table('contact_table')
                    ->where('user_id', $user->id)
                    ->get();
    } else {
        $select = DB::table('contact_table')
                    ->where('user_id')
                    ->get();
    }

    return view('Contact.displayContact', [
        'allcontact' => $select
    ]);
}

   
}
