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
use App\Models\PrasaranaSanitasi;
class PotensiSdmPrasaranaSanitasiController extends Controller{

 public function listPrasaranaSanitasi()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = PrasaranaSanitasi::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "prasarana-sanitasi", "title" => "Potensi - Prasarana Sanitasi");
        return view('desa.potensi.list-prasarana-sanitasi', array("route" => $route, "data" => $data));

    }

    public function newPrasaranaSanitasi()
    {
        $route = array("main" => "potensi", "sub" => "prasarana-sanitasi", "title" => "Potensi - Prasarana sanitasi");
        return view('desa.potensi.new-prasarana-sanitasi', array("route" => $route));
    }

    public function editPrasaranaSanitasi($id)
    {
        $data  = PrasaranaSanitasi::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "prasarana-sanitasi", "title" => "Potensi - Prasarana Sanitasi");
        return view('desa.potensi.edit-prasarana-sanitasi', array("route" => $route, "data" => $data));
    }

     function insertPrasaranaSanitasi (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$sumur_resapan_air_rumah_tangga=$request->input('sumur_resapan_air_rumah_tangga');
$mck_umum_unit=$request->input('mck_umum_unit');
$jamban_keluarga_kk=$request->input('jamban_keluarga_kk');
$saluran_drainase_atau_saluran_pembuangan_sampah=$request->input('saluran_drainase_atau_saluran_pembuangan_sampah');
$kondisi_saluran_drainase_atau_saluran=$request->input('kondisi_saluran_drainase_atau_saluran');
$record = New PrasaranaSanitasi;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->sumur_resapan_air_rumah_tangga = system_numerik($sumur_resapan_air_rumah_tangga);
$record->mck_umum_unit = system_numerik($mck_umum_unit);
$record->jamban_keluarga_kk = system_numerik($jamban_keluarga_kk);
$record->saluran_drainase_atau_saluran_pembuangan_sampah = $saluran_drainase_atau_saluran_pembuangan_sampah;
$record->kondisi_saluran_drainase_atau_saluran = $kondisi_saluran_drainase_atau_saluran;
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sdm/prasarana-sanitasi'));
}

//tambahkan fungsi update data PrasaranaSanitasi
function updatePrasaranaSanitasi (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$tanggal=$request->input('tanggal');
$sumur_resapan_air_rumah_tangga=$request->input('sumur_resapan_air_rumah_tangga');
$mck_umum_unit=$request->input('mck_umum_unit');
$jamban_keluarga_kk=$request->input('jamban_keluarga_kk');
$saluran_drainase_atau_saluran_pembuangan_sampah=$request->input('saluran_drainase_atau_saluran_pembuangan_sampah');
$kondisi_saluran_drainase_atau_saluran=$request->input('kondisi_saluran_drainase_atau_saluran');
$record = PrasaranaSanitasi::find($id);
if($record){
$record->tanggal = tanggalSystem($tanggal);
$record->sumur_resapan_air_rumah_tangga = system_numerik($sumur_resapan_air_rumah_tangga);
$record->mck_umum_unit = system_numerik($mck_umum_unit);
$record->jamban_keluarga_kk = system_numerik($jamban_keluarga_kk);
$record->saluran_drainase_atau_saluran_pembuangan_sampah = $saluran_drainase_atau_saluran_pembuangan_sampah;
$record->kondisi_saluran_drainase_atau_saluran = $kondisi_saluran_drainase_atau_saluran;
$record->save();
$request->session()->flash('notice', "Update Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-sanitasi'));
}else{
throw new HttpException(404);
}
}


//fungsi hapus data PrasaranaSanitasi
function deletePrasaranaSanitasi (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$record = PrasaranaSanitasi::find($id);
if($record){
$record->delete();
$request->session()->flash('notice', "Hapus Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-sanitasi'));
}else{
throw new HttpException(404);
}
}

}