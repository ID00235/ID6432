<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\JumlahPenduduk;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdmJumlahPendudukController extends Controller
{

    public function listJumlahPenduduk()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = JumlahPenduduk::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Jumlah Penduduk");
        return view('desa.potensi.list-jumlah-penduduk', array("route" => $route, "data" => $data));
    }

    public function newJumlahPenduduk()
    {
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Jumlah Penduduk");
        return view('desa.potensi.new-jumlah-penduduk', array("route" => $route));
    }

    public function editJumlahPenduduk($id)
    {
        $data  = JumlahPenduduk::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Jumlah Penduduk");
        return view('desa.potensi.edit-jumlah-penduduk', array("route" => $route, "data" => $data));
    }

    public function insertJumlahPenduduk(Request $request)
    {
        $id_desa                  = $request->input('id_desa');
        $id_desa                  = Hashids::decode($id_desa)[0];
        $tanggal                  = $request->input('tanggal');
        $jumlah_laki_laki         = $request->input('jumlah_laki_laki');
        $jumlah_perempuan         = $request->input('jumlah_perempuan');
        $jumlah_total             = $request->input('jumlah_total');
        $record                   = new JumlahPenduduk;
        $record->id_desa          = $id_desa;
        $record->tanggal          = tanggalSystem($tanggal);
        $record->jumlah_laki_laki = $jumlah_laki_laki;
        $record->jumlah_perempuan = $jumlah_perempuan;
        $record->jumlah_total     = $jumlah_total;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sdm/jumlah-penduduk'));
    }

    public function updateJumlahPenduduk(Request $request)
    {
        $id               = Crypt::decrypt($request->input('id'));
        $tanggal          = $request->input('tanggal');
        $jumlah_laki_laki = $request->input('jumlah_laki_laki');
        $jumlah_perempuan = $request->input('jumlah_perempuan');
        $jumlah_total     = $request->input('jumlah_total');
        $record           = JumlahPenduduk::find($id);
        if ($record) {
            $record->tanggal          = tanggalSystem($tanggal);
            $record->jumlah_laki_laki = $jumlah_laki_laki;
            $record->jumlah_perempuan = $jumlah_perempuan;
            $record->jumlah_total     = $jumlah_total;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/jumlah-penduduk'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data JumlahPenduduk
    public function deleteJumlahPenduduk(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = JumlahPenduduk::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/jumlah-penduduk'));
        } else {
            throw new HttpException(404);
        }
    }

}
