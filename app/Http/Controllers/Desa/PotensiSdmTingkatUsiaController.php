<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\TingkatUsia;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdmTingkatUsiaController extends Controller
{

    public function listTingkatUsia()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = TingkatUsia::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Tingkat Usia");
        return view('desa.potensi.list-tingkat-usia', array("route" => $route, "data" => $data));
    }

    public function newTingkatUsia()
    {
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Tingkat Usia");
        return view('desa.potensi.new-tingkat-usia', array("route" => $route));
    }

    public function insertTingkatUsia(Request $request)
    {
        $id_desa                      = $request->input('id_desa');
        $id_desa                      = Hashids::decode($id_desa)[0];
        $tanggal                      = $request->input('tanggal');
        $usia_dibawah_1_tahun         = $request->input('usia_dibawah_1_tahun');
        $usia_1_sd_5_tahun            = $request->input('usia_1_sd_5_tahun');
        $usia_6_sd_10_tahun           = $request->input('usia_6_sd_10_tahun');
        $usia_11_sd_15_tahun          = $request->input('usia_11_sd_15_tahun');
        $usia_16_sd_20_tahun          = $request->input('usia_16_sd_20_tahun');
        $usia_21_sd_30_tahun          = $request->input('usia_21_sd_30_tahun');
        $usia_31_sd_40_tahun          = $request->input('usia_31_sd_40_tahun');
        $usia_41_sd_50_tahun          = $request->input('usia_41_sd_50_tahun');
        $usia_51_sd_60_tahun          = $request->input('usia_51_sd_60_tahun');
        $usia_diatas_60_tahun         = $request->input('usia_diatas_60_tahun');
        $record                       = new TingkatUsia;
        $record->id_desa              = $id_desa;
        $record->tanggal              = tanggalSystem($tanggal);
        $record->usia_dibawah_1_tahun = $usia_dibawah_1_tahun;
        $record->usia_1_sd_5_tahun    = $usia_1_sd_5_tahun;
        $record->usia_6_sd_10_tahun   = $usia_6_sd_10_tahun;
        $record->usia_11_sd_15_tahun  = $usia_11_sd_15_tahun;
        $record->usia_16_sd_20_tahun  = $usia_16_sd_20_tahun;
        $record->usia_21_sd_30_tahun  = $usia_21_sd_30_tahun;
        $record->usia_31_sd_40_tahun  = $usia_31_sd_40_tahun;
        $record->usia_41_sd_50_tahun  = $usia_41_sd_50_tahun;
        $record->usia_51_sd_60_tahun  = $usia_51_sd_60_tahun;
        $record->usia_diatas_60_tahun = $usia_diatas_60_tahun;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sdm/tingkat-usia'));
    }

    public function editTingkatUsia($id)
    {
        $data  = TingkatUsia::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Tingkat Usia");
        return view('desa.potensi.edit-tingkat-usia', array("route" => $route, "data" => $data));
    }

//tambahkan fungsi update data TingkatUsia
    public function updateTingkatUsia(Request $request)
    {
        $id                   = Crypt::decrypt($request->input('id'));
        $tanggal              = $request->input('tanggal');
        $usia_dibawah_1_tahun = $request->input('usia_dibawah_1_tahun');
        $usia_1_sd_5_tahun    = $request->input('usia_1_sd_5_tahun');
        $usia_6_sd_10_tahun   = $request->input('usia_6_sd_10_tahun');
        $usia_11_sd_15_tahun  = $request->input('usia_11_sd_15_tahun');
        $usia_16_sd_20_tahun  = $request->input('usia_16_sd_20_tahun');
        $usia_21_sd_30_tahun  = $request->input('usia_21_sd_30_tahun');
        $usia_31_sd_40_tahun  = $request->input('usia_31_sd_40_tahun');
        $usia_41_sd_50_tahun  = $request->input('usia_41_sd_50_tahun');
        $usia_51_sd_60_tahun  = $request->input('usia_51_sd_60_tahun');
        $usia_diatas_60_tahun = $request->input('usia_diatas_60_tahun');
        $record               = TingkatUsia::find($id);
        if ($record) {
            $record->tanggal              = tanggalSystem($tanggal);
            $record->usia_dibawah_1_tahun = $usia_dibawah_1_tahun;
            $record->usia_1_sd_5_tahun    = $usia_1_sd_5_tahun;
            $record->usia_6_sd_10_tahun   = $usia_6_sd_10_tahun;
            $record->usia_11_sd_15_tahun  = $usia_11_sd_15_tahun;
            $record->usia_16_sd_20_tahun  = $usia_16_sd_20_tahun;
            $record->usia_21_sd_30_tahun  = $usia_21_sd_30_tahun;
            $record->usia_31_sd_40_tahun  = $usia_31_sd_40_tahun;
            $record->usia_41_sd_50_tahun  = $usia_41_sd_50_tahun;
            $record->usia_51_sd_60_tahun  = $usia_51_sd_60_tahun;
            $record->usia_diatas_60_tahun = $usia_diatas_60_tahun;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/tingkat-usia'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data TingkatUsia
    public function deleteTingkatUsia(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = TingkatUsia::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/tingkat-usia'));
        } else {
            throw new HttpException(404);
        }
    }

}
