<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\PotensiPemanfaatanAir;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdaPotensiPemanfaatanAirController extends Controller
{

    public function listPotensiPemanfaatanAir()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = PotensiPemanfaatanAir::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "potensi-pemanfaatan-air", "title" => "Potensi - Potensi Pemanfaatan Air");
        return view('desa.potensi.list-potensi-pemanfaatan-air', array("route" => $route, "data" => $data));

    }

    public function newPotensiPemanfaatanAir()
    {
        $route = array("main" => "potensi", "sub" => "potensi-pemanfaatan-air", "title" => "Potensi - Potensi Pemanfaatan Air");
        return view('desa.potensi.new-potensi-pemanfaatan-air', array("route" => $route));
    }

    public function editPotensiPemanfaatanAir($id)
    {
        $data  = PotensiPemanfaatanAir::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "potensi-pemanfaatan-air", "title" => "Potensi - Potensi Pemanfaatan Air");
        return view('desa.potensi.edit-potensi-pemanfaatan-air', array("route" => $route, "data" => $data));
    }

    public function insertPotensiPemanfaatanAir(Request $request)
    {
        $id_desa                                       = $request->input('id_desa');
        $id_desa                                       = Hashids::decode($id_desa)[0];
        $tanggal                                       = $request->input('tanggal');
        $jenis_potensi_air_dan_sumber_daya_air         = $request->input('jenis_potensi_air_dan_sumber_daya_air');
        $jumlah_buah_atau_luas_ha                      = $request->input('jumlah_(buah)_atau_luas_(ha)');
        $debit_atau_volume                             = $request->input('debit_atau_volume');
        $kondisi                                       = $request->input('kondisi');
        $pemanfaatan                                   = $request->input('pemanfaatan');
        $record                                        = new PotensiPemanfaatanAir;
        $record->id_desa                               = $id_desa;
        $record->tanggal                               = tanggalSystem($tanggal);
        $record->jenis_potensi_air_dan_sumber_daya_air = $jenis_potensi_air_dan_sumber_daya_air;
        $record->jumlah_buah_atau_luas_ha              = system_numerik($jumlah_buah_atau_luas_ha);
        $record->debit_atau_volume                     = $debit_atau_volume;
        $record->kondisi                               = $kondisi;
        $record->pemanfaatan                           = $pemanfaatan;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/potensi-pemanfaatan-air'));
    }

//tambahkan fungsi update data PotensiPemanfaatanAir
    public function updatePotensiPemanfaatanAir(Request $request)
    {
        $id                                    = Crypt::decrypt($request->input('id'));
        $tanggal                               = $request->input('tanggal');
        $jenis_potensi_air_dan_sumber_daya_air = $request->input('jenis_potensi_air_dan_sumber_daya_air');
        $jumlah_buah_atau_luas_ha              = $request->input('jumlah_buah_atau_luas_ha');
        $debit_atau_volume                     = $request->input('debit_atau_volume');
        $kondisi                               = $request->input('kondisi');
        $pemanfaatan                           = $request->input('pemanfaatan');
        $record                                = PotensiPemanfaatanAir::find($id);
        if ($record) {
            $record->tanggal                               = tanggalSystem($tanggal);
            $record->jenis_potensi_air_dan_sumber_daya_air = $jenis_potensi_air_dan_sumber_daya_air;
            $record->jumlah_buah_atau_luas_ha              = system_numerik($jumlah_buah_atau_luas_ha);
            $record->debit_atau_volume                     = $debit_atau_volume;
            $record->kondisi                               = $kondisi;
            $record->pemanfaatan                           = $pemanfaatan;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/potensi-pemanfaatan-air'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data PotensiPemanfaatanAir
    public function deletePotensiPemanfaatanAir(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = PotensiPemanfaatanAir::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/potensi-pemanfaatan-air'));
        } else {
            throw new HttpException(404);
        }
    }

}
