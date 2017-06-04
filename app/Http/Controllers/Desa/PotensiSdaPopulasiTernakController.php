<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\PopulasiTernak;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdaPopulasiTernakController extends Controller
{

    public function listPopulasiTernak()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = PopulasiTernak::select(['populasi_ternak.*', 'komuditas.nama as nama_komoditas'])
            ->where('id_desa', $id_desa)
            ->leftjoin('komuditas', 'komuditas.id', '=', 'populasi_ternak.komoditas')
            ->orderby('tanggal', 'desc')->get();
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Populasi Ternak");
        return view('desa.potensi.list-populasi-ternak', array("route" => $route, "data" => $data));
    }

    public function newPopulasiTernak()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Populasi Ternak");
        return view('desa.potensi.new-populasi-ternak', array("route" => $route));
    }

    public function editPopulasiTernak($id)
    {
        $data  = PopulasiTernak::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "potensi-pemanfaatan-air", "title" => "Potensi - Populasi Ternak");
        return view('desa.potensi.edit-populasi-ternak', array("route" => $route, "data" => $data));
    }

    public function insertPopulasiTernak(Request $request)
    {
        $id_desa                             = $request->input('id_desa');
        $id_desa                             = Hashids::decode($id_desa)[0];
        $tanggal                             = $request->input('tanggal');
        $komoditas                           = $request->input('komoditas');
        $jumlah_pemilik                      = $request->input('jumlah_pemilik');
        $populasi                            = $request->input('populasi');
        $dijual_langsung_ke_konsumen         = $request->input('dijual_langsung_ke_konsumen');
        $dijual_melalui_kud                  = $request->input('dijual_melalui_kud');
        $dijual_melalui_tengkulak            = $request->input('dijual_melalui_tengkulak');
        $dijual_melalui_pengecer             = $request->input('dijual_melalui_pengecer');
        $dijual_ke_lumbung_desa              = $request->input('dijual_ke_lumbung_desa');
        $tidak_dijual                        = $request->input('tidak_dijual');
        $record                              = new PopulasiTernak;
        $record->id_desa                     = $id_desa;
        $record->tanggal                     = tanggalSystem($tanggal);
        $record->komoditas                   = $komoditas;
        $record->jumlah_pemilik              = $jumlah_pemilik;
        $record->populasi                    = $populasi;
        $record->dijual_langsung_ke_konsumen = $dijual_langsung_ke_konsumen;
        $record->dijual_melalui_kud          = $dijual_melalui_kud;
        $record->dijual_melalui_tengkulak    = $dijual_melalui_tengkulak;
        $record->dijual_melalui_pengecer     = $dijual_melalui_pengecer;
        $record->dijual_ke_lumbung_desa      = $dijual_ke_lumbung_desa;
        $record->tidak_dijual                = $tidak_dijual;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/populasi-ternak'));
    }

//tambahkan fungsi update data PopulasiTernak
    public function updatePopulasiTernak(Request $request)
    {
        $id                          = Crypt::decrypt($request->input('id'));
        $tanggal                     = $request->input('tanggal');
        $komoditas                   = $request->input('komoditas');
        $jumlah_pemilik              = $request->input('jumlah_pemilik');
        $populasi                    = $request->input('populasi');
        $dijual_langsung_ke_konsumen = $request->input('dijual_langsung_ke_konsumen');
        $dijual_melalui_kud          = $request->input('dijual_melalui_kud');
        $dijual_melalui_tengkulak    = $request->input('dijual_melalui_tengkulak');
        $dijual_melalui_pengecer     = $request->input('dijual_melalui_pengecer');
        $dijual_ke_lumbung_desa      = $request->input('dijual_ke_lumbung_desa');
        $tidak_dijual                = $request->input('tidak_dijual');
        $record                      = PopulasiTernak::find($id);
        if ($record) {
            $record->tanggal                     = tanggalSystem($tanggal);
            $record->komoditas                   = $komoditas;
            $record->jumlah_pemilik              = $jumlah_pemilik;
            $record->populasi                    = $populasi;
            $record->dijual_langsung_ke_konsumen = $dijual_langsung_ke_konsumen;
            $record->dijual_melalui_kud          = $dijual_melalui_kud;
            $record->dijual_melalui_tengkulak    = $dijual_melalui_tengkulak;
            $record->dijual_melalui_pengecer     = $dijual_melalui_pengecer;
            $record->dijual_ke_lumbung_desa      = $dijual_ke_lumbung_desa;
            $record->tidak_dijual                = $tidak_dijual;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/populasi-ternak'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data PopulasiTernak
    public function deletePopulasiTernak(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = PopulasiTernak::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/populasi-ternak'));
        } else {
            throw new HttpException(404);
        }
    }

}
