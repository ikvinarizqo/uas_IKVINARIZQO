<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Kota;


class KotaController extends Controller
{
    public function index () {
        $listKota = Kota::get();
        return view('kota.index',compact('listKota'))->with('i');;
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
        ->with('success', 'kota Berhasil Di tambahkan');
    }

    public function showFormEdit (int $id) {
        $listKota = Kota::findOrFail($id);
        return view('kota.edit',compact('listKota'));
    }

    public function proccesEdit(Request $request,int $id){
        $kota =  Kota::findOrFail($id);


        $kota->update([
            'nama_kota' => $request->nama_kota,
            'nama_pemimpin' => $request->nama_pemimpin,
            'tanggal_berdiri' => $request->tanggal_berdiri,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'luas_wilayah' => $request->luas_wilayah,
            'status' => $request->status,
            'keunggulan' => $request->keunggulan,
        ]);

        return redirect()->route('list-kota')
        ->with('success', 'kota Berhasil Di tambahkan');
    }

    public function destroy(int $id)
    {
        $dataKota =  Kota::findOrFail($id);

        $dataKota->delete();
        return redirect()->route('list-kota')
            ->with('success', 'kota Berhasil Di hapus');
    }

    public function downloadPdf()
    {
        $listKota = Kota::all(); // Ambil semua data kota dari model
    
        $data = [
            'listKota' => $listKota,
        ];
    
        $pdf = PDF::loadView('pdf.invoice', $data); // Load view 'pdf.invoice' dengan data yang telah Anda siapkan
        return $pdf->download('invoice.pdf'); // Download PDF dengan nama 'invoice.pdf'
    }
    
}