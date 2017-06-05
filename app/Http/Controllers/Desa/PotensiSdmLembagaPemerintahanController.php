<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\LembagaPemerintahan;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdmLembagaPemerintahanController extends Controller
{

    public function listLembagaPemerintahan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = LembagaPemerintahan::where('id_desa', $id_desa)->get();
        $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Pemerintahan");
        return view('desa.potensi.list-lembaga-pemerintahan', array("route" => $route, "data" => $data));
    }

    public function newLembagaPemerintahan()
    {
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Pemerintahan");
        return view('desa.potensi.new-lembaga-pemerintahan', array("route" => $route));
    }

    public function editLembagaPemerintahan($id)
    {
        $data  = LembagaPemerintahan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Pemerintahan");
        return view('desa.potensi.edit-lembaga-pemerintahan', array("route" => $route, "data" => $data));
    }

    public function insertLembagaPemerintahan(Request $request)
    {
        $id_desa                             = $request->input('id_desa');
        $id_desa                             = Hashids::decode($id_desa)[0];
        $tanggal                             = $request->input('tanggal');
        $dasar_hukum_pembentukan             = $request->input('dasar_hukum_pembentukan');
        $dasar_hukum_pembentukan_bpd         = $request->input('dasar_hukum_pembentukan_bpd');
        $jumlah_perangkat_desa               = $request->input('jumlah_perangkat_desa');
        $nama_kepala_desa                    = $request->input('nama_kepala_desa');
        $pendidikan_kepala_desa              = $request->input('pendidikan_kepala_desa');
        $nama_sekretaris_desa                = $request->input('nama_sekretaris_desa');
        $pendidikan_sekdes                   = $request->input('pendidikan_sekdes');
        $nama_ketua_bpd                      = $request->input('nama_ketua_bpd');
        $pendidikan_ketua_bpd                = $request->input('pendidikan_ketua_bpd');
        $record                              = new LembagaPemerintahan;
        $record->id_desa                     = $id_desa;
        $record->tanggal                     = tanggalSystem($tanggal);
        $record->dasar_hukum_pembentukan     = $dasar_hukum_pembentukan;
        $record->dasar_hukum_pembentukan_bpd = $dasar_hukum_pembentukan_bpd;
        $record->jumlah_perangkat_desa       = $jumlah_perangkat_desa;
        $record->nama_kepala_desa            = $nama_kepala_desa;
        $record->pendidikan_kepala_desa      = $pendidikan_kepala_desa;
        $record->nama_sekretaris_desa        = $nama_sekretaris_desa;
        $record->pendidikan_sekdes           = $pendidikan_sekdes;
        $record->nama_ketua_bpd              = $nama_ketua_bpd;
        $record->pendidikan_ketua_bpd        = $pendidikan_ketua_bpd;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sdm/lembaga-pemerintahan'));
    }

    public function updateLembagaPemerintahan(Request $request)
    {
        $id                          = Crypt::decrypt($request->input('id'));
        $tanggal                     = $request->input('tanggal');
        $dasar_hukum_pembentukan     = $request->input('dasar_hukum_pembentukan');
        $dasar_hukum_pembentukan_bpd = $request->input('dasar_hukum_pembentukan_bpd');
        $jumlah_perangkat_desa       = $request->input('jumlah_perangkat_desa');
        $nama_kepala_desa            = $request->input('nama_kepala_desa');
        $pendidikan_kepala_desa      = $request->input('pendidikan_kepala_desa');
        $nama_sekretaris_desa        = $request->input('nama_sekretaris_desa');
        $pendidikan_sekdes           = $request->input('pendidikan_sekdes');
        $nama_ketua_bpd              = $request->input('nama_ketua_bpd');
        $pendidikan_ketua_bpd        = $request->input('pendidikan_ketua_bpd');
        $record                      = LembagaPemerintahan::find($id);
        if ($record) {
            $record->tanggal                     = tanggalSystem($tanggal);
            $record->dasar_hukum_pembentukan     = $dasar_hukum_pembentukan;
            $record->dasar_hukum_pembentukan_bpd = $dasar_hukum_pembentukan_bpd;
            $record->jumlah_perangkat_desa       = $jumlah_perangkat_desa;
            $record->nama_kepala_desa            = $nama_kepala_desa;
            $record->pendidikan_kepala_desa      = $pendidikan_kepala_desa;
            $record->nama_sekretaris_desa        = $nama_sekretaris_desa;
            $record->pendidikan_sekdes           = $pendidikan_sekdes;
            $record->nama_ketua_bpd              = $nama_ketua_bpd;
            $record->pendidikan_ketua_bpd        = $pendidikan_ketua_bpd;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/lembaga-pemerintahan'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data LembagaPemerintahan
    public function deleteLembagaPemerintahan(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = LembagaPemerintahan::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/lembaga-pemerintahan'));
        } else {
            throw new HttpException(404);
        }
    }

}
