<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\HasilKebun;
use App\User;
use Auth;
use DB;
use Crypt;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

//model (table) yang digunakan

class PotensiSdaHasilKebunController extends Controller
{

    public function listHasilKebun()
    {

        $id_desa = Auth::user()->userdesa();
        $data    = HasilKebun::select(['hasil_kebun.*',
            DB::raw('year(hasil_kebun.tanggal) as tahun'), 'komuditas.nama as nama_komuditas'])
            ->where('id_desa', $id_desa)
            ->leftjoin('komuditas', 'komuditas.id', '=', 'hasil_kebun.komuditas')
            ->orderby('tanggal', 'desc')->get();
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Perkebunan");
        return view('desa.potensi.list-hasil-kebun', array("route" => $route, "data" => $data));
    }

    public function newHasilKebun()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Perkebunan");
        return view('desa.potensi.new-hasil-kebun', array("route" => $route));
    }

    public function editHasilKebun($id)
    {
        $data  = HasilKebun::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Edit Produksi Perkebunan");
        return view('desa.potensi.edit-hasil-kebun', array("route" => $route, "data" => $data));
    }

    public function insertHasilKebun(Request $request)
    {
        $id_desa                                = $request->input('id_desa');
        $id_desa                                = Hashids::decode($id_desa)[0];
        $tanggal                                = $request->input('tanggal');
        $komuditas                              = $request->input('komuditas');
        $luas_perkebunan_swasta_negara          = $request->input('luas_perkebunan_swasta_negara');
        $hasil_perkebunan_swasta_negara         = $request->input('hasil_perkebunan_swasta_negara');
        $luas_perkebunan_rakyat                 = $request->input('luas_perkebunan_rakyat');
        $hasil_perkebunan_rakyat                = $request->input('hasil_perkebunan_rakyat');
        $harga_lokal                            = $request->input('harga_lokal');
        $nilai_produksi_tahun_ini               = $request->input('nilai_produksi_tahun_ini');
        $biaya_pemupukan                        = $request->input('biaya_pemupukan');
        $biaya_bibit                            = $request->input('biaya_bibit');
        $biaya_obat                             = $request->input('biaya_obat');
        $biaya_lainnya                          = $request->input('biaya_lainnya');
        $saldo_produksi                         = $request->input('saldo_produksi');
        $dijual_langsung_ke_konsumen            = $request->input('dijual_langsung_ke_konsumen');
        $dijual_melalui_kud                     = $request->input('dijual_melalui_kud');
        $dijual_melalui_tengkulak               = $request->input('dijual_melalui_tengkulak');
        $dijual_melalui_pengecer                = $request->input('dijual_melalui_pengecer');
        $dijual_ke_lumbung_desa                 = $request->input('dijual_ke_lumbung_desa');
        $tidak_dijual                           = $request->input('tidak_dijual');
        $record                                 = new HasilKebun;
        $record->id_desa                        = $id_desa;
        $record->tanggal                        = tanggalSystem($tanggal);
        $record->komuditas                      = $komuditas;
        $record->luas_perkebunan_swasta_negara  = system_numerik($luas_perkebunan_swasta_negara);
        $record->hasil_perkebunan_swasta_negara = system_numerik($hasil_perkebunan_swasta_negara);
        $record->luas_perkebunan_rakyat         = system_numerik($luas_perkebunan_rakyat);
        $record->hasil_perkebunan_rakyat        = system_numerik($hasil_perkebunan_rakyat);
        $record->harga_lokal                    = system_numerik($harga_lokal);
        $record->nilai_produksi_tahun_ini       = system_numerik($nilai_produksi_tahun_ini);
        $record->biaya_pemupukan                = system_numerik($biaya_pemupukan);
        $record->biaya_bibit                    = system_numerik($biaya_bibit);
        $record->biaya_obat                     = system_numerik($biaya_obat);
        $record->biaya_lainnya                  = system_numerik($biaya_lainnya);
        $record->saldo_produksi                 = system_numerik($saldo_produksi);
        $record->dijual_langsung_ke_konsumen    = $dijual_langsung_ke_konsumen;
        $record->dijual_melalui_kud             = $dijual_melalui_kud;
        $record->dijual_melalui_tengkulak       = $dijual_melalui_tengkulak;
        $record->dijual_melalui_pengecer        = $dijual_melalui_pengecer;
        $record->dijual_ke_lumbung_desa         = $dijual_ke_lumbung_desa;
        $record->tidak_dijual                   = $tidak_dijual;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/hasil-kebun'));
    }

    public function updateHasilKebun(Request $request)
    {
        $id                             = Crypt::decrypt($request->input('id'));
        $tanggal                        = $request->input('tanggal');
        $komuditas                      = $request->input('komuditas');
        $luas_perkebunan_swasta_negara  = $request->input('luas_perkebunan_swasta_negara');
        $hasil_perkebunan_swasta_negara = $request->input('hasil_perkebunan_swasta_negara');
        $luas_perkebunan_rakyat         = $request->input('luas_perkebunan_rakyat');
        $hasil_perkebunan_rakyat        = $request->input('hasil_perkebunan_rakyat');
        $harga_lokal                    = $request->input('harga_lokal');
        $nilai_produksi_tahun_ini       = $request->input('nilai_produksi_tahun_ini');
        $biaya_pemupukan                = $request->input('biaya_pemupukan');
        $biaya_bibit                    = $request->input('biaya_bibit');
        $biaya_obat                     = $request->input('biaya_obat');
        $biaya_lainnya                  = $request->input('biaya_lainnya');
        $saldo_produksi                 = $request->input('saldo_produksi');
        $dijual_langsung_ke_konsumen    = $request->input('dijual_langsung_ke_konsumen');
        $dijual_melalui_kud             = $request->input('dijual_melalui_kud');
        $dijual_melalui_tengkulak       = $request->input('dijual_melalui_tengkulak');
        $dijual_melalui_pengecer        = $request->input('dijual_melalui_pengecer');
        $dijual_ke_lumbung_desa         = $request->input('dijual_ke_lumbung_desa');
        $tidak_dijual                   = $request->input('tidak_dijual');
        $record                         = HasilKebun::find($id);
        if ($record) {
            $record->tanggal                        = tanggalSystem($tanggal);
            $record->komuditas                      = $komuditas;
            $record->luas_perkebunan_swasta_negara  = system_numerik($luas_perkebunan_swasta_negara);
            $record->hasil_perkebunan_swasta_negara = system_numerik($hasil_perkebunan_swasta_negara);
            $record->luas_perkebunan_rakyat         = system_numerik($luas_perkebunan_rakyat);
            $record->hasil_perkebunan_rakyat        = system_numerik($hasil_perkebunan_rakyat);
            $record->harga_lokal                    = system_numerik($harga_lokal);
            $record->nilai_produksi_tahun_ini       = system_numerik($nilai_produksi_tahun_ini);
            $record->biaya_pemupukan                = system_numerik($biaya_pemupukan);
            $record->biaya_bibit                    = system_numerik($biaya_bibit);
            $record->biaya_obat                     = system_numerik($biaya_obat);
            $record->biaya_lainnya                  = system_numerik($biaya_lainnya);
            $record->saldo_produksi                 = system_numerik($saldo_produksi);
            $record->dijual_langsung_ke_konsumen    = $dijual_langsung_ke_konsumen;
            $record->dijual_melalui_kud             = $dijual_melalui_kud;
            $record->dijual_melalui_tengkulak       = $dijual_melalui_tengkulak;
            $record->dijual_melalui_pengecer        = $dijual_melalui_pengecer;
            $record->dijual_ke_lumbung_desa         = $dijual_ke_lumbung_desa;
            $record->tidak_dijual                   = $tidak_dijual;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/hasil-kebun'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data HasilKebun
    public function deleteHasilKebun(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = HasilKebun::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/hasil-kebun'));
        } else {
            throw new HttpException(404);
        }
    }

    public function hitungnilaiproduksi(Request $request)
    {
        $luas_perkebunan_swasta_negara  = system_numerik($request->input('luas_perkebunan_swasta_negara'));
        $hasil_perkebunan_swasta_negara = system_numerik($request->input('hasil_perkebunan_swasta_negara'));
        $luas_perkebunan_rakyat         = system_numerik($request->input('luas_perkebunan_rakyat'));
        $hasil_perkebunan_rakyat        = system_numerik($request->input('hasil_perkebunan_rakyat'));
        $harga_lokal                    = system_numerik($request->input('harga_lokal'));

        $nilai = ($luas_perkebunan_swasta_negara + $luas_perkebunan_rakyat) * ($hasil_perkebunan_rakyat +
            $hasil_perkebunan_swasta_negara) * $harga_lokal;
        return array("hasil" => desimal2($nilai));

    }

    public function hitungsaldoproduksi(Request $request)
    {

        $nilai_produksi_tahun_ini = system_numerik($request->input('nilai_produksi_tahun_ini'));
        $biaya_pemupukan          = system_numerik($request->input('biaya_pemupukan'));
        $biaya_obat               = system_numerik($request->input('biaya_obat'));
        $biaya_bibit              = system_numerik($request->input('biaya_bibit'));
        $biaya_lainnya            = system_numerik($request->input('biaya_lainnya'));

        $nilai = $nilai_produksi_tahun_ini - ($biaya_pemupukan + $biaya_obat + $biaya_bibit + $biaya_lainnya);
        return array("hasil" => desimal2($nilai));

    }

   

}
