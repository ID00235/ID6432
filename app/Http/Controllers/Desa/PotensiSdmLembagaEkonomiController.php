<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\LembagaEkonomi;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdmLembagaEkonomiController extends Controller
{

    public function listLembagaEkonomi()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = LembagaEkonomi::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Ekonomi");
        return view('desa.potensi.list-lembaga-ekonomi', array("route" => $route, "data" => $data));
    }

    public function newLembagaEkonomi()
    {
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Ekonomi");
        return view('desa.potensi.new-lembaga-ekonomi', array("route" => $route));
    }

    public function editLembagaEkonomi($id)
    {
        $data  = LembagaEkonomi::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Ekonomi");
        return view('desa.potensi.edit-lembaga-ekonomi', array("route" => $route, "data" => $data));
    }

    public function insertLembagaEkonomi(Request $request)
    {
        $id_desa                 = $request->input('id_desa');
        $id_desa                 = Hashids::decode($id_desa)[0];
        $tanggal                 = $request->input('tanggal');
        $kategori                = $request->input('kategori');
        $jenis_lembaga           = $request->input('jenis_lembaga');
        $jumlah                  = $request->input('jumlah');
        $jumlah_pengurus         = $request->input('jumlah_pengurus');
        $jumlah_kegiatan         = $request->input('jumlah_kegiatan');
        $record                  = new LembagaEkonomi;
        $record->id_desa         = $id_desa;
        $record->tanggal         = tanggalSystem($tanggal);
        $record->kategori        = $kategori;
        $record->jenis_lembaga   = $jenis_lembaga;
        $record->jumlah          = $jumlah;
        $record->jumlah_pengurus = $jumlah_pengurus;
        $record->jumlah_kegiatan = $jumlah_kegiatan;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sdm/lembaga-ekonomi'));
    }

    public function updateLembagaEkonomi(Request $request)
    {
        $id              = Crypt::decrypt($request->input('id'));
        $tanggal         = $request->input('tanggal');
        $kategori        = $request->input('kategori');
        $jenis_lembaga   = $request->input('jenis_lembaga');
        $jumlah          = $request->input('jumlah');
        $jumlah_pengurus = $request->input('jumlah_pengurus');
        $jumlah_kegiatan = $request->input('jumlah_kegiatan');
        $record          = LembagaEkonomi::find($id);
        if ($record) {
            $record->tanggal         = tanggalSystem($tanggal);
            $record->kategori        = $kategori;
            $record->jenis_lembaga   = $jenis_lembaga;
            $record->jumlah          = $jumlah;
            $record->jumlah_pengurus = $jumlah_pengurus;
            $record->jumlah_kegiatan = $jumlah_kegiatan;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/lembaga-ekonomi'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data LembagaEkonomi
    public function deleteLembagaEkonomi(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = LembagaEkonomi::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/lembaga-ekonomi'));
        } else {
            throw new HttpException(404);
        }
    }

}
