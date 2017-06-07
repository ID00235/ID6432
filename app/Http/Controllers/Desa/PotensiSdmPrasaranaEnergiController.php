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
use App\Models\PrasaranaEnergi;
class PotensiSdmPrasaranaEnergiController extends Controller{

public function listPrasaranaEnergi()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = PrasaranaEnergi::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "prasarana-energi", "title" => "Potensi - Prasarana Energi");
        return view('desa.potensi.list-prasarana-energi', array("route" => $route, "data" => $data));

    }

    public function newPrasaranaEnergi()
    {
        $route = array("main" => "potensi", "sub" => "prasarana-energi", "title" => "Potensi - Prasarana Energi");
        return view('desa.potensi.new-prasarana-energi', array("route" => $route));
    }

    public function editPrasaranaEnergi($id)
    {
        $data  = PrasaranaEnergi::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "prasarana-energi", "title" => "Potensi - Prasarana Energi");
        return view('desa.potensi.edit-prasarana-energi', array("route" => $route, "data" => $data));
    }

function insertPrasaranaEnergi (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$listrik_pln_unit=$request->input('listrik_pln_unit');
$diesel_umum_unit=$request->input('diesel_umum_unit');
$genset_pribadi_unit=$request->input('genset_pribadi_unit');
$lampu_minyak_tanah_atau_jarak_kelapa_kk=$request->input('lampu_minyak_tanah_atau_jarak_kelapa_kk');
$kayu_bakar_kk=$request->input('kayu_bakar_kk');
$batu_bara_kk=$request->input('batu_bara_kk');
$tanpa_penerangan_kk=$request->input('tanpa_penerangan_kk');
$record = New PrasaranaEnergi;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->listrik_pln_unit = system_numerik($listrik_pln_unit);
$record->diesel_umum_unit = system_numerik($diesel_umum_unit);
$record->genset_pribadi_unit = system_numerik($genset_pribadi_unit);
$record->lampu_minyak_tanah_atau_jarak_kelapa_kk = system_numerik($lampu_minyak_tanah_atau_jarak_kelapa_kk);
$record->kayu_bakar_kk = system_numerik($kayu_bakar_kk);
$record->batu_bara_kk = system_numerik($batu_bara_kk);
$record->tanpa_penerangan_kk = system_numerik($tanpa_penerangan_kk);
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sdm/prasarana-energi'));
}

//tambahkan fungsi update data PrasaranaEnergi
function updatePrasaranaEnergi (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$tanggal=$request->input('tanggal');
$listrik_pln_unit=$request->input('listrik_pln_unit');
$diesel_umum_unit=$request->input('diesel_umum_unit');
$genset_pribadi_unit=$request->input('genset_pribadi_unit');
$lampu_minyak_tanah_atau_jarak_kelapa_kk=$request->input('lampu_minyak_tanah_atau_jarak_kelapa_kk');
$kayu_bakar_kk=$request->input('kayu_bakar_kk');
$batu_bara_kk=$request->input('batu_bara_kk');
$tanpa_penerangan_kk=$request->input('tanpa_penerangan_kk');
$record = PrasaranaEnergi::find($id);
if($record){
$record->tanggal = tanggalSystem($tanggal);
$record->listrik_pln_unit = system_numerik($listrik_pln_unit);
$record->diesel_umum_unit = system_numerik($diesel_umum_unit);
$record->genset_pribadi_unit = system_numerik($genset_pribadi_unit);
$record->lampu_minyak_tanah_atau_jarak_kelapa_kk = system_numerik($lampu_minyak_tanah_atau_jarak_kelapa_kk);
$record->kayu_bakar_kk = system_numerik($kayu_bakar_kk);
$record->batu_bara_kk = system_numerik($batu_bara_kk);
$record->tanpa_penerangan_kk = system_numerik($tanpa_penerangan_kk);
$record->save();
$request->session()->flash('notice', "Update Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-energi'));
}else{
throw new HttpException(404);
}
}


//fungsi hapus data PrasaranaEnergi
function deletePrasaranaEnergi (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$record = PrasaranaEnergi::find($id);
if($record){
$record->delete();
$request->session()->flash('notice', "Hapus Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-energi'));
}else{
throw new HttpException(404);
}
}

}