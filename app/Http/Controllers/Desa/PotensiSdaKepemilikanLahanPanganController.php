<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\KepemilikanLahanPangan;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

//model (table) yang digunakan

class PotensiSdaKepemilikanLahanPanganController extends Controller
{

    public function listKepemilikanLahanPangan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = KepemilikanLahanPangan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Kepemilikan Lahan Pangan");
        return view('desa.potensi.list-kepemilikan-lahan-pangan', array("route" => $route, "data" => $data));
    }

    public function newKepemilikanLahanPangan()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Kepemilikan Lahan Pangan");
        return view('desa.potensi.new-kepemilikan-lahan-pangan', array("route" => $route));
    }

    public function editKepemilikanLahanPangan($id)
    {
        $data  = KepemilikanLahanPangan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Kepemilikan Lahan Pangan");
        return view('desa.potensi.edit-kepemilikan-lahan-pangan', array("route" => $route, "data" => $data));
    }

    public function insertKepemilikanLahanPangan(Request $request)
    {
        $tanggal                                       = $request->input('tanggal');
        $id_desa                                       = $request->input('id_desa');
        $id_desa                                       = Hashids::decode($id_desa)[0];
        $memiliki_kurang_10_ha                         = $request->input('memiliki_kurang_10_ha');
        $memiliki_10_sd_50_ha                          = $request->input('memiliki_10_sd_50_ha');
        $memiliki_50_sd_100_haha                       = $request->input('memiliki_50_sd_100_haha');
        $memiliki_lebih_dari_100_ha                    = $request->input('memiliki_lebih_dari_100_ha');
        $jumlah_keluarga_memiliki_lahan                = $request->input('jumlah_keluarga_memiliki_lahan');
        $jumlah_keluarga_tidak_memiliki_lahan          = $request->input('jumlah_keluarga_tidak_memiliki_lahan');
        $jumlah_keluarga_petani_tanaman_pangan         = $request->input('jumlah_keluarga_petani_tanaman_pangan');
        $record                                        = new KepemilikanLahanPangan;
        $record->tanggal                               = tanggalSystem($tanggal);
        $record->id_desa                               = $id_desa;
        $record->memiliki_kurang_10_ha                 = $memiliki_kurang_10_ha;
        $record->memiliki_10_sd_50_ha                  = $memiliki_10_sd_50_ha;
        $record->memiliki_50_sd_100_ha                 = $memiliki_50_sd_100_haha;
        $record->memiliki_lebih_dari_100_ha            = $memiliki_lebih_dari_100_ha;
        $record->jumlah_keluarga_memiliki_lahan        = $jumlah_keluarga_memiliki_lahan;
        $record->jumlah_keluarga_tidak_memiliki_lahan  = $jumlah_keluarga_tidak_memiliki_lahan;
        $record->jumlah_keluarga_petani_tanaman_pangan = $jumlah_keluarga_petani_tanaman_pangan;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/kepemilikan-lahan-pangan'));
    }

    //tambahkan fungsi update data KepemilikanLahanPangan
    public function updateKepemilikanLahanPangan(Request $request)
    {
        $id                                    = Crypt::decrypt($request->input('id'));
        $tanggal                               = $request->input('tanggal');
        $memiliki_kurang_10_ha                 = $request->input('memiliki_kurang_10_ha');
        $memiliki_10_sd_50_ha                  = $request->input('memiliki_10_sd_50_ha');
        $memiliki_50_sd_100_ha                 = $request->input('memiliki_50_sd_100_ha');
        $memiliki_lebih_dari_100_ha            = $request->input('memiliki_lebih_dari_100_ha');
        $jumlah_keluarga_memiliki_lahan        = $request->input('jumlah_keluarga_memiliki_lahan');
        $jumlah_keluarga_tidak_memiliki_lahan  = $request->input('jumlah_keluarga_tidak_memiliki_lahan');
        $jumlah_keluarga_petani_tanaman_pangan = $request->input('jumlah_keluarga_petani_tanaman_pangan');
        $record                                = KepemilikanLahanPangan::find($id);
        if ($record) {
            $record->tanggal                               = tanggalSystem($tanggal);
            $record->memiliki_kurang_10_ha                 = $memiliki_kurang_10_ha;
            $record->memiliki_10_sd_50_ha                  = $memiliki_10_sd_50_ha;
            $record->memiliki_50_sd_100_ha                 = $memiliki_50_sd_100_ha;
            $record->memiliki_lebih_dari_100_ha            = $memiliki_lebih_dari_100_ha;
            $record->jumlah_keluarga_memiliki_lahan        = $jumlah_keluarga_memiliki_lahan;
            $record->jumlah_keluarga_tidak_memiliki_lahan  = $jumlah_keluarga_tidak_memiliki_lahan;
            $record->jumlah_keluarga_petani_tanaman_pangan = $jumlah_keluarga_petani_tanaman_pangan;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/kepemilikan-lahan-pangan'));
        } else {
            throw new HttpException(404);
        }
    }

    //fungsi hapus data KepemilikanLahanPangan
    public function deleteKepemilikanLahanPangan(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = KepemilikanLahanPangan::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/kepemilikan-lahan-pangan'));
        } else {
            throw new HttpException(404);
        }
    }

}
