<?php
namespace App\Http\Controllers\Desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use URL;
use DB;
use Validator;
use Yajra\Datatables\Datatables;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Vinkla\Hashids\Facades\Hashids;
use App\User;
//model (table) yang digunakan
use App\Models\PrasaranaKesehatan;
class PotensiSdmPrasaranaKesehatanController extends Controller{

 public function listPrasaranaKesehatan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = PrasaranaKesehatan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "prasarana-kesehatan", "title" => "Potensi - Prasarana Kesehatan");
        return view('desa.potensi.list-prasarana-kesehatan', array("route" => $route, "data" => $data));

    }

    public function newPrasaranaKesehatan()
    {
        $route = array("main" => "potensi", "sub" => "prasarana-kesehatan", "title" => "Potensi - Prasarana-kesehatan");
        return view('desa.potensi.new-prasarana-kesehatan', array("route" => $route));
    }

    public function editPrasaranaKesehatan($id)
    {
        $data  = PrasaranaKesehatan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "prasarana-kesehatan", "title" => "Potensi - Prasarana Kesehatan");
        return view('desa.potensi.edit-prasarana-kesehatan', array("route" => $route, "data" => $data));
    }

    function insertPrasaranaKesehatan (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$jenis_prasarana_kesehatan=$request->input('jenis_prasarana_kesehatan');
$jumlah_unit=$request->input('jumlah_unit');
$record = New PrasaranaKesehatan;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->jenis_prasarana_kesehatan = $jenis_prasarana_kesehatan;
$record->jumlah_unit = system_numerik($jumlah_unit);
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sdm/prasarana-kesehatan'));
}

//tambahkan fungsi update data PrasaranaKesehatan
function updatePrasaranaKesehatan (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$tanggal=$request->input('tanggal');
$jenis_prasarana_kesehatan=$request->input('jenis_prasarana_kesehatan');
$jumlah_unit=$request->input('jumlah_unit');
$record = PrasaranaKesehatan::find($id);
if($record){
$record->tanggal = tanggalSystem($tanggal);
$record->jenis_prasarana_kesehatan = $jenis_prasarana_kesehatan;
$record->jumlah_unit = system_numerik($jumlah_unit);
$record->save();
$request->session()->flash('notice', "Update Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-kesehatan'));
}else{
throw new HttpException(404);
}
}


//fungsi hapus data PrasaranaKesehatan
function deletePrasaranaKesehatan (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$record = PrasaranaKesehatan::find($id);
if($record){
$record->delete();
$request->session()->flash('notice', "Hapus Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-kesehatan'));
}else{
throw new HttpException(404);
}
}

}