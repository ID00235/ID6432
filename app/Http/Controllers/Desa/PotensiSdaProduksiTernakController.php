<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\ProduksiTernak;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdaProduksiTernakController extends Controller
{

    public function listProduksiTernak()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = ProduksiTernak::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Peternakan");
        return view('desa.potensi.list-produksi-ternak', array("route" => $route, "data" => $data));
    }

    public function newProduksiTernak()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Peternakan");
        return view('desa.potensi.new-produksi-ternak', array("route" => $route));
    }

    public function editProduksiTernak($id)
    {
        $data  = ProduksiTernak::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Peternakan");
        return view('desa.potensi.edit-produksi-ternak', array("route" => $route, "data" => $data));
    }

    public function insertProduksiTernak(Request $request)
    {
        $id_desa                          = $request->input('id_desa');
        $id_desa                          = Hashids::decode($id_desa)[0];
        $tanggal                          = $request->input('tanggal');
        $jenis_produksi                   = $request->input('jenis_produksi');
        $hasil_produksi                   = $request->input('hasil_produksi');
        $satuan                           = $request->input('satuan');
        $nilai_produksi_tahun_ini         = $request->input('nilai_produksi_tahun_ini');
        $jumlah_ternak                    = $request->input('jumlah_ternak');
        $record                           = new ProduksiTernak;
        $record->id_desa                  = $id_desa;
        $record->tanggal                  = tanggalSystem($tanggal);
        $record->jenis_produksi           = $jenis_produksi;
        $record->hasil_produksi           = $hasil_produksi;
        $record->satuan                   = $satuan;
        $record->nilai_produksi_tahun_ini = system_numerik($nilai_produksi_tahun_ini);
        $record->jumlah_ternak            = $jumlah_ternak;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/produksi-ternak'));
    }

//tambahkan fungsi update data ProduksiTernak
    public function updateProduksiTernak(Request $request)
    {
        $id                       = Crypt::decrypt($request->input('id'));
        $tanggal                  = $request->input('tanggal');
        $jenis_produksi           = $request->input('jenis_produksi');
        $hasil_produksi           = $request->input('hasil_produksi');
        $satuan                   = $request->input('satuan');
        $nilai_produksi_tahun_ini = $request->input('nilai_produksi_tahun_ini');
        $jumlah_ternak            = $request->input('jumlah_ternak');
        $record                   = ProduksiTernak::find($id);
        if ($record) {
            $record->tanggal                  = tanggalSystem($tanggal);
            $record->jenis_produksi           = $jenis_produksi;
            $record->hasil_produksi           = $hasil_produksi;
            $record->satuan                   = $satuan;
            $record->nilai_produksi_tahun_ini = system_numerik($nilai_produksi_tahun_ini);
            $record->jumlah_ternak            = $jumlah_ternak;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/produksi-ternak'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data ProduksiTernak
    public function deleteProduksiTernak(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = ProduksiTernak::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/produksi-ternak'));
        } else {
            throw new HttpException(404);
        }
    }

}
