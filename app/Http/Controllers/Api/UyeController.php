<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Danisan;
use App\Models\Diyetisyen;
use App\Models\Uye;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class UyeController extends Controller
{
    public function form(Request $req)
    {

        echo "
        <form action='/api/register' method='POST'>
        
<input type='text' name='email' placeholder='email'>
<input type='password' name='password' placeholder='şifre'>
<input type='radio' name='rol' value='1'>Diyetisyen  |  <input type='radio' name='rol' value='2'>Danışan
<input type='hidden' name='_token' value='" . csrf_token() . "'>
<button>Submit</button>
        </form>
        ";
    }
    public function login(Request $req)
    {
        if ($req->email) {
            $query = Uye::where("email", $req->email)->where("password", md5($req->password))->first();
            if ($query) {
                $data['token'] = $query->token;
                $data['rol'] = $query->rol;
                $data['giris'] = 1;
                $data['message'] = "Giriş Başarılı";
                return response()->json($data);
            } else {
                $data['message'] = "Giriş Başarısız";
                $data['giris'] = 0;
            }
            return response()->json($data);
        }
    }
    public function register(Request $req)
    {
        if ($req->email) {
            $query = Uye::where("email", $req->email)->first();
            if ($query) {
                $data['kayit'] = 0;
                $data['message'] = "Daha önce kayıt olmuş";
                return response()->json($data);
            }
            $ekle = Uye::create([
                "email" => $req->email,
                "rol" => $req->rol,
                "password" => md5($req->password),
                "token" => md5($req->email)
                
            ]);
           
            if ($ekle) {

                if ($req->rol == 1) {
                    Diyetisyen::create([
                        "kullanici_id" => $ekle->id
                    ]);
                } elseif ($req->rol == 2) {
                    Danisan::create([
                        "kullanici_id" => $ekle->id
                    ]);
                }
                if ($ekle) {
                    $ekle['kayit'] = 1;
                    $ekle['message'] = "Kayıt başarılı";
                    return response()->json($ekle);
                }
            }
        }
    }
}
