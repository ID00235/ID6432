<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\TingkatPendidikan;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdmTingkatPendidikanController extends Controller
{

    public function listTingkatPendidikan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = TingkatPendidikan::where('id_desa', $id_desa)->get();
        $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Tingkat Pendidikan");
        return view('desa.potensi.list-tingkat-pendidikan', array("route" => $route, "data" => $data));
    }

    public function newTingkatPendidikan()
    {
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Tingkat Pendidikan");
        return view('desa.potensi.new-tingkat-pendidikan', array("route" => $route));
    }

    public function editTingkatPendidikan($id)
    {
        $data  = TingkatPendidikan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Tingkat Pendidikan");
        return view('desa.potensi.edit-tingkat-pendidikan', array("route" => $route, "data" => $data));
    }

    public function insertTingkatPendidikan(Request $request)
    {
        $id_desa                    = $request->input('id_desa');
        $id_desa                    = Hashids::decode($id_desa)[0];
        $tingkat_pendidikan         = $request->input('tingkat_pendidikan');
        $laki_laki                  = $request->input('laki_laki');
        $perempuan                  = $request->input('perempuan');
        $jumlah                     = $request->input('jumlah');
        $record                     = new TingkatPendidikan;
        $record->id_desa            = $id_desa;
        $record->tingkat_pendidikan = $tingkat_pendidikan;
        $record->laki_laki          = $laki_laki;
        $record->perempuan          = $perempuan;
        $record->jumlah             = $jumlah;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sdm/tingkat-pendidikan'));
    }

    public function updateTingkatPendidikan(Request $request)
    {
        $id                 = Crypt::decrypt($request->input('id'));
        $tingkat_pendidikan = $request->input('tingkat_pendidikan');
        $laki_laki          = $request->input('laki_laki');
        $perempuan          = $request->input('perempuan');
        $jumlah             = $request->input('jumlah');
        $record             = TingkatPendidikan::find($id);
        if ($record) {
            $record->tingkat_pendidikan = $tingkat_pendidikan;
            $record->laki_laki          = $laki_laki;
            $record->perempuan          = $perempuan;
            $record->jumlah             = $jumlah;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/tingkat-pendidikan'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data TingkatPendidikan
    public function deleteTingkatPendidikan(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = TingkatPendidikan::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sdm/tingkat-pendidikan'));
        } else {
            throw new HttpException(404);
        }
    }

}
