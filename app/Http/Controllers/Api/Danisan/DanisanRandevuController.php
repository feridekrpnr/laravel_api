<?php

namespace App\Http\Controllers\Api\Danisan;

use App\Http\Controllers\Controller;
use App\Models\Diyetisyen;
use App\Models\Danisan;
use App\Models\Kullanici;
use App\Models\Randevu;
use App\Models\Saat;
use Illuminate\Http\Request;

class DanisanRandevuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDiyetisyen(Request $request)
    {
        $data['diyetisyenler'] = Diyetisyen::all();
        return response()->json($data);
    }
    public function index(Request $request)
    {
        //   return response(Rol::paginate(10), 200);
        $user = Kullanici::where("token", $request->token)->first(); //tokena sahip kullanıcı
        $danisan = Danisan::where("kullanici_id", $user->id)->first(); //kullanici ide göre user
        $tarih = $request->tarih;
        $saatler = Saat::all();
        foreach ($saatler as $key => $saat) {
            $saatler[$key]->tarih = $request->tarih;
            $saatler[$key]->diyetisyen_id = $request->diyetisyen_id;
            $sor = Randevu::where("saat_id", $saat->id)->where("tarih", $tarih)->first(); //bu tarih ve saate göre randevu eklenmiş mi?
            if ($sor) {
                $saatler[$key]->musait = 0; //dolu
            } else {
                $saatler[$key]->musait = 1; //boş
            }

            $diyetisyen = Diyetisyen::find($request->diyetisyen_id);
            if ($diyetisyen) {
                $saatler[$key]->diyetisyen_adi = $diyetisyen->adi;
            } else {
                $saatler[$key]->diyetisyen_adi = "-";
            }
        }
        $data['saatler'] = $saatler;
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Kullanici::where("token", $request->token)->first();
        $danisan = Danisan::where("kullanici_id", $user->id)->first();
        $input = $request->all(); //gelen tüm dataya erişim sağlar
        //veri tabanına kaydetme
        $randevu = new Randevu;
        $randevu->tarih = $request->tarih;
        $randevu->saat_id = $request->saat_id;
        $randevu->danisan_id = $danisan->id;
        $randevu->diyetisyen_id = $request->diyetisyen_id;
        $sor=Randevu::where("saat_id", $request->saat_id)->where("tarih", $request->tarih)->first();
        if ($sor) {
            return response([
                'message' => 'randevu oluşturulamadı saat ve tarih dolu'
            ], 201);
        } else {
            $randevu->save();
        }

        return response([
            'message' => 'randevu oluşturuldu'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Randevu  $randevu
     * @return \Illuminate\Http\Response
     */
    public function randevularim(Request $request)
    {
        $user = Kullanici::where("token", $request->token)->first();
        $danisan = Danisan::where("kullanici_id", $user->id)->first();
        $randevular = Randevu::where("danisan_id",$danisan->id)->get();
        
        if ($randevular->first()) {

            $diyetisyen=Diyetisyen::find($randevular->diyetisyen_id);
            if($diyetisyen){
                $randevular->diyetisyen=$diyetisyen->adi;
            }
            return response()->json($randevular, 200);
        }        
            
        else
            return response(['message' => 'Randevu bulunamadi'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Randevu  $randevu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Randevu $randevu, $id)
    {
        $randevu = Randevu::find($id);
        $randevu->randevu_tarih = $request->randevu_tarih;
        $randevu->randevu_saat = $request->randevu_saat;
        $randevu->danisan_id = $request->danisan_id;
        $randevu->diyetisyen_id = $request->diyetisyen_id;
        $randevu->save();

        return response([
            'data' => $randevu,
            'message' => 'randevu güncellendi'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Randevu  $randevu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Randevu $randevu, $id)
    {
        $randevu = Randevu::find($id);
        $randevu->delete();

        return response([
            'message' => 'randevu silindi'
        ], 201);
    }
    public function cek($id)
    {
        $a = Diyetisyen::where($id, $id)->get();
        return $a;
    }
}
