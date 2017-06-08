<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\HasilHutan;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;


class PotensiSdaHasilHutanController extends Controller
{

    public function listHasilHutan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = HasilHutan::select(['hasil_hutan.*', 'komuditas.nama as nama_komoditas'])
            ->where('id_desa', $id_desa)
            ->leftjoin('komuditas', 'komuditas.id', '=', 'hasil_hutan.komoditas')
            ->orderby('tanggal', 'desc')->get();
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Produksi Hutan");
        return view('desa.potensi.list-hasil-hutan', array("route" => $route, "data" => $data));
    }

    public function newHasilHutan()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Hasil Hutan");
        return view('desa.potensi.new-hasil-hutan', array("route" => $route));
    }

    public function editHasilHutan($id)
    {
        $data  = HasilHutan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Edit Produksi Hutan");
        return view('desa.potensi.edit-hasil-hutan', array("route" => $route, "data" => $data));
    }

    public function insertHasilHutan(Request $request)
    {
        $id_desa                                       = $request->input('id_desa');
        $id_desa                                       = Hashids::decode($id_desa)[0];
        $tanggal                                       = $request->input('tanggal');
        $komoditas                                     = $request->input('komoditas');
        $hasil_produksi                                = $request->input('hasil_produksi');
        $satuan                                        = $request->input('satuan');
        $dijual_langsung_ke_konsumen                   = $request->input('dijual_langsung_ke_konsumen');
        $dijual_kepasar                                = $request->input('dijual_kepasar');
        $dijual_melalui_KUD                            = $request->input('dijual_melalui_KUD');
        $dijual_melalui_tengkulak                      = $request->input('dijual_melalui_tengkulak');
        $dijual_melalui_pengecer                       = $request->input('dijual_melalui_pengecer');
        $dijual_ke_lumbung_desa_atau_kelurahan         = $request->input('dijual_ke_lumbung_desa_atau_kelurahan');
        $tidak_dijual                                  = $request->input('tidak_dijual');
        $record                                        = new HasilHutan;
        $record->id_desa                               = $id_desa;
        $record->tanggal                               = tanggalSystem($tanggal);
        $record->komoditas                             = $komoditas;
        $record->hasil_produksi                        = system_numerik($hasil_produksi);
        $record->satuan                                = $satuan;
        $record->dijual_langsung_ke_konsumen           = $dijual_langsung_ke_konsumen;
        $record->dijual_kepasar                        = $dijual_kepasar;
        $record->dijual_melalui_KUD                    = $dijual_melalui_KUD;
        $record->dijual_melalui_tengkulak              = $dijual_melalui_tengkulak;
        $record->dijual_melalui_pengecer               = $dijual_melalui_pengecer;
        $record->dijual_ke_lumbung_desa_atau_kelurahan = $dijual_ke_lumbung_desa_atau_kelurahan;
        $record->tidak_dijual                          = $tidak_dijual;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/hasil-hutan'));
    }

    //tambahkan fungsi update data HasilHutan
    public function updateHasilHutan(Request $request)
    {
        $id                                    = Crypt::decrypt($request->input('id'));
        $tanggal                               = $request->input('tanggal');
        $komoditas                             = $request->input('komoditas');
        $hasil_produksi                        = $request->input('hasil_produksi');
        $satuan                                = $request->input('satuan');
        $dijual_langsung_ke_konsumen           = $request->input('dijual_langsung_ke_konsumen');
        $dijual_kepasar                        = $request->input('dijual_kepasar');
        $dijual_melalui_KUD                    = $request->input('dijual_melalui_KUD');
        $dijual_melalui_tengkulak              = $request->input('dijual_melalui_tengkulak');
        $dijual_melalui_pengecer               = $request->input('dijual_melalui_pengecer');
        $dijual_ke_lumbung_desa_atau_kelurahan = $request->input('dijual_ke_lumbung_desa_atau_kelurahan');
        $tidak_dijual                          = $request->input('tidak_dijual');
        $record                                = HasilHutan::find($id);
        if ($record) {
            $record->tanggal                               = tanggalSystem($tanggal);
            $record->komoditas                             = $komoditas;
            $record->hasil_produksi                        = system_numerik($hasil_produksi);
            $record->satuan                                = $satuan;
            $record->dijual_langsung_ke_konsumen           = $dijual_langsung_ke_konsumen;
            $record->dijual_kepasar                        = $dijual_kepasar;
            $record->dijual_melalui_KUD                    = $dijual_melalui_KUD;
            $record->dijual_melalui_tengkulak              = $dijual_melalui_tengkulak;
            $record->dijual_melalui_pengecer               = $dijual_melalui_pengecer;
            $record->dijual_ke_lumbung_desa_atau_kelurahan = $dijual_ke_lumbung_desa_atau_kelurahan;
            $record->tidak_dijual                          = $tidak_dijual;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/hasil-hutan'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data HasilHutan
    public function deleteHasilHutan(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = HasilHutan::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/hasil-hutan'));
        } else {
            throw new HttpException(404);
        }
    }




}
