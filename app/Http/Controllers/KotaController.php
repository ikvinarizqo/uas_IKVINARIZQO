<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;


class KotaController extends Controller
{
    public function index () {
        $listKota = Kota::get();
        return view('kota.index',compact('$listKota'));
    }

    public function showFormAdd(){
        return view('kota.add');
    }

    public function processAdd(Request $request){
        $kota = Kota::create([
            'nama_kota' => $request->nama_kota,
            'nama_pemimpin' => $request->nama_pemimpin,
            'tanggal_berdiri' => $request->tanggal_berdiri,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'luas_wilayah' => $request->luas_wilayah,
            'status' => $request->status,
            'keunggulan' => $request->keunggulan,
        ]);
        $kota->save();

        return redirect()->route('list-kota')
        ->with('success', 'mesin Berhasil Di tambahkan');
    }
}

