<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\LembagaKeamanan;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdaLembagaKeamananController extends Controller
{

    public function listLembagaKeamanan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = LembagaKeamanan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Keamanan");
        return view('desa.potensi.list-lembaga-keamanan', array("route" => $route, "data" => $data));
    }

    public function newLembagaKeamanan()
    {
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Keamanan");
        return view('desa.potensi.new-lembaga-keamanan', array("route" => $route));
    }

    public function editLembagaKeamanan($id)
    {
        $data  = LembagaKeamanan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Keamanan");
        return view('desa.potensi.edit-lembaga-keamanan', array("route" => $route, "data" => $data));
    }

    public function insertLembagaKeamanan(Request $request)
    {
        $id_desa                          = $request->input('id_desa');
        $id_desa                          = Hashids::decode($id_desa)[0];
        $tanggal                          = $request->input('tanggal');
        $keberadaan_hansip_linmas         = $request->input('keberadaan_hansip_linmas');
        $jumlah_anggota_hansip            = $request->input('jumlah_anggota_hansip');
        $jumlah_anggota_linmas            = $request->input('jumlah_anggota_linmas');
        $pelaksanaan_siskamling           = $request->input('pelaksanaan_siskamling');
        $jumlah_pos_kamling               = $request->input('jumlah_pos_kamling');
        $record                           = new LembagaKeamanan;
        $record->id_desa                  = $id_desa;
        $record->tanggal                  = tanggalSystem($tanggal);
        $record->keberadaan_hansip_linmas = $keberadaan_hansip_linmas;
        $record->jumlah_anggota_hansip    = $jumlah_anggota_hansip;
        $record->jumlah_anggota_linmas    = $jumlah_anggota_linmas;
        $record->pelaksanaan_siskamling   = $pelaksanaan_siskamling;
        $record->jumlah_pos_kamling       = $jumlah_pos_kamling;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sdm/lembaga-keamanan'));
    }

//tambahkan fungsi update data LembagaKeamanan
    public function updateLembagaKeamanan(Request $request)
    {
        $id                       = Crypt::decrypt($request->input('id'));
        $tanggal                  = $request->input('tanggal');
        $keberadaan_hansip_linmas = $request->input('keberadaan_hansip_linmas');
        $jumlah_anggota_hansip    = $request->input('jumlah_anggota_hansip');
        $jumlah_anggota_linmas    = $request->input('jumlah_anggota_linmas');
        $pelaksanaan_siskamling   = $request->input('pelaksanaan_siskamling');
        $jumlah_pos_kamling       = $request->input('jumlah_pos_kamling');
        $record                   = LembagaKeamanan::find($id);
        if ($record) {
            $record->tanggal                  = tanggalSystem($tanggal);
            $record->keberadaan_hansip_linmas = $keberadaan_hansip_linmas;
            $record->jumlah_anggota_hansip    = $jumlah_anggota_hansip;
            $record->jumlah_anggota_linmas    = $jumlah_anggota_linmas;
            $record->pelaksanaan_siskamling   = $pelaksanaan_siskamling;
            $record->jumlah_pos_kamling       = $jumlah_pos_kamling;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/lembaga-keamanan'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data LembagaKeamanan
    public function deleteLembagaKeamanan(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = LembagaKeamanan::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/lembaga-keamanan'));
        } else {
            throw new HttpException(404);
        }
    }

}
