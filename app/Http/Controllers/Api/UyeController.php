<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Uye;
use Illuminate\Http\Request;

class UyeController extends Controller
{
    public function form(Request $req){

        echo "
        <form action='/api/register' method='POST'>
        
<input type='text' name='email' placeholder='email'>
<input type='password' name='password' placeholder='şifre'>
<input type='hidden' name='rol' value='1'>
<input type='hidden' name='_token' value='".csrf_token()."'>
<button>Submit</button>
        </form>
        ";

    }
        public function register(Request $req){
     if($req->email){
         $query=Uye::where("email",$req->email)->first();
         if($query){
             die("bu email kayıtlı");
         }
         Uye::create([
             "email"=>$req->email,
             "rol"=>$req->rol,
             "password"=> \Hash::make($req->password),
             "token"=> \Hash::make($req->email)
         ]);
     }
    }
}
