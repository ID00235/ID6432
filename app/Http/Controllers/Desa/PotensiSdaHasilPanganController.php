<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\HasilPangan;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

//model (table) yang digunakan

class PotensiSdaHasilPanganController extends Controller
{

    public function listHasilPangan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = HasilPangan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Tanaman Pangan");
        return view('desa.potensi.list-hasil-pangan', array("route" => $route, "data" => $data));
    }

    public function newHasilPangan()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Tanaman Pangan");
        return view('desa.potensi.new-hasil-pangan', array("route" => $route));
    }

    public function editHasilPangan($id)
    {
        $data  = HasilPangan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Produksi Tanaman Pangan");
        return view('desa.potensi.edit-hasil-pangan', array("route" => $route, "data" => $data));
    }

    public function insertHasilPangan(Request $request)
    {
        $id_desa                          = $request->input('id_desa');
        $id_desa                          = Hashids::decode($id_desa)[0];
        $tanggal                          = $request->input('tanggal');
        $komuditas                        = $request->input('komuditas');
        $luas_produksi                    = $request->input('luas_produksi');
        $hasil_produksi                   = $request->input('hasil_produksi');
        $harga_lokal                      = $request->input('harga_lokal');
        $nilai_produksi_tahun_ini         = $request->input('nilai_produksi_tahun_ini');
        $biaya_pemupukan                  = $request->input('biaya_pemupukan');
        $biaya_bibit                      = $request->input('biaya_bibit');
        $biaya_obat                       = $request->input('biaya_obat');
        $biaya_lainnya                    = $request->input('biaya_lainnya');
        $saldo_produksi                   = $request->input('saldo_produksi');
        $record                           = new HasilPangan;
        $record->id_desa                  = $id_desa;
        $record->tanggal                  = tanggalSystem($tanggal);
        $record->komuditas                = $komuditas;
        $record->luas_produksi            = system_numerik($luas_produksi);
        $record->hasil_produksi           = system_numerik($hasil_produksi);
        $record->harga_lokal              = system_numerik($harga_lokal);
        $record->nilai_produksi_tahun_ini = system_numerik($nilai_produksi_tahun_ini);
        $record->biaya_pemupukan          = system_numerik($biaya_pemupukan);
        $record->biaya_bibit              = system_numerik($biaya_bibit);
        $record->biaya_obat               = system_numerik($biaya_obat);
        $record->biaya_lainnya            = system_numerik($biaya_lainnya);
        $record->saldo_produksi           = system_numerik($saldo_produksi);
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/hasil-pangan'));
    }

    public function updateHasilPangan(Request $request)
    {
        $id                       = Crypt::decrypt($request->input('id'));
        $tanggal                  = $request->input('tanggal');
        $komuditas                = $request->input('komuditas');
        $luas_produksi            = $request->input('luas_produksi');
        $hasil_produksi           = $request->input('hasil_produksi');
        $harga_lokal              = $request->input('harga_lokal');
        $nilai_produksi_tahun_ini = $request->input('nilai_produksi_tahun_ini');
        $biaya_pemupukan          = $request->input('biaya_pemupukan');
        $biaya_bibit              = $request->input('biaya_bibit');
        $biaya_obat               = $request->input('biaya_obat');
        $biaya_lainnya            = $request->input('biaya_lainnya');
        $saldo_produksi           = $request->input('saldo_produksi');
        $record                   = HasilPangan::find($id);
        if ($record) {
            $record->tanggal                  = tanggalSystem($tanggal);
            $record->komuditas                = $komuditas;
            $record->luas_produksi            = system_numerik($luas_produksi);
            $record->hasil_produksi           = system_numerik($hasil_produksi);
            $record->harga_lokal              = system_numerik($harga_lokal);
            $record->nilai_produksi_tahun_ini = system_numerik($nilai_produksi_tahun_ini);
            $record->biaya_pemupukan          = system_numerik($biaya_pemupukan);
            $record->biaya_bibit              = system_numerik($biaya_bibit);
            $record->biaya_obat               = system_numerik($biaya_obat);
            $record->biaya_lainnya            = system_numerik($biaya_lainnya);
            $record->saldo_produksi           = system_numerik($saldo_produksi);
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/hasil-pangan'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data HasilPangan
    public function deleteHasilPangan(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = HasilPangan::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/hasil-pangan'));
        } else {
            throw new HttpException(404);
        }
    }

}
