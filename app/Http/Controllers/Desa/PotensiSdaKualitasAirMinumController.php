<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\KualitasAirMinum;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdaKualitasAirMinumController extends Controller
{

    public function listKualitasAirMinum()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = KualitasAirMinum::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "kualitas-air-minum", "title" => "Potensi - Kualitas Air Minum");
        return view('desa.potensi.list-kualitas-air-minum', array("route" => $route, "data" => $data));
    }

    public function newKualitasAirMinum()
    {
        $route = array("main" => "potensi", "sub" => "kualitas-air-minum", "title" => "Potensi - Kualitas Air Minum");
        return view('desa.potensi.new-kualitas-air-minum', array("route" => $route));
    }

    public function editKualitasAirMinum($id)
    {
        $data  = KualitasAirMinum::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "kualitas-air-minum", "title" => "Potensi - Kualitas Air Minum");
        return view('desa.potensi.edit-kualitas-air-minum', array("route" => $route, "data" => $data));
    }

    public function insertKualitasAirMinum(Request $request)
    {
        $id_desa                 = $request->input('id_desa');
        $id_desa                 = Hashids::decode($id_desa)[0];
        $tanggal                 = $request->input('tanggal');
        $jenis_air_minum         = $request->input('jenis_air_minum');
        $baik                    = $request->input('baik');
        $berbau                  = $request->input('berbau');
        $berwarna                = $request->input('berwarna');
        $berasa                  = $request->input('berasa');
        $record                  = new KualitasAirMinum;
        $record->id_desa         = $id_desa;
        $record->tanggal         = tanggalSystem($tanggal);
        $record->jenis_air_minum = $jenis_air_minum;
        $record->baik            = $baik;
        $record->berbau          = $berbau;
        $record->berwarna        = $berwarna;
        $record->berasa          = $berasa;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/kualitas-air-minum'));
    }

//tambahkan fungsi update data KualitasAirMinum
    public function updateKualitasAirMinum(Request $request)
    {
        $id              = Crypt::decrypt($request->input('id'));
        $tanggal         = $request->input('tanggal');
        $jenis_air_minum = $request->input('jenis_air_minum');
        $baik            = $request->input('baik');
        $berbau          = $request->input('berbau');
        $berwarna        = $request->input('berwarna');
        $berasa          = $request->input('berasa');
        $record          = KualitasAirMinum::find($id);
        if ($record) {
            $record->tanggal         = tanggalSystem($tanggal);
            $record->jenis_air_minum = $jenis_air_minum;
            $record->baik            = $baik;
            $record->berbau          = $berbau;
            $record->berwarna        = $berwarna;
            $record->berasa          = $berasa;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/kualitas-air-minum'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data KualitasAirMinum
    public function deleteKualitasAirMinum(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = KualitasAirMinum::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/kualitas-air-minum'));
        } else {
            throw new HttpException(404);
        }
    }
}
