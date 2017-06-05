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
use App\Models\LembagaMasyarakat;
class PotensiSdmLembagaMasyarakatController extends Controller{


function listLembagaMasyarakat(){
	$id_desa = Auth::user()->userdesa();
    $data    = LembagaMasyarakat::where('id_desa', $id_desa)->get();
    $route   = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Masyarakat");
    return view('desa.potensi.list-lembaga-masyarakat', array("route" => $route, "data" => $data));
}

function newLembagaMasyarakat(){
	$route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Masyarakat");
    return view('desa.potensi.new-lembaga-masyarakat', array("route" => $route));
}


function editLembagaMasyarakat($id){
	 $data  = LembagaMasyarakat::find(Hashids::decode($id)[0]);
    $route = array("main" => "potensi", "sub" => "sdm", "title" => "Potensi - Lembaga Masyarakat");
    return view('desa.potensi.edit-lembaga-masyarakat', array("route" => $route, "data" => $data));
}


function insertLembagaMasyarakat (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$jenis_lembaga=$request->input('jenis_lembaga');
$jumlah=$request->input('jumlah');
$dasar_hukum_pembentukan=$request->input('dasar_hukum_pembentukan');
$jumlah_pengurus=$request->input('jumlah_pengurus');
$ruang_lingkup_kegiatan=$request->input('ruang_lingkup_kegiatan');
$jumlah_jenis_kegiatan=$request->input('jumlah_jenis_kegiatan');
$record = New LembagaMasyarakat;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->jenis_lembaga = $jenis_lembaga;
$record->jumlah = $jumlah;
$record->dasar_hukum_pembentukan = $dasar_hukum_pembentukan;
$record->jumlah_pengurus = $jumlah_pengurus;
$record->ruang_lingkup_kegiatan = $ruang_lingkup_kegiatan;
$record->jumlah_jenis_kegiatan = $jumlah_jenis_kegiatan;
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sdm/lembaga-masyarakat'));
}

function updateLembagaMasyarakat (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$tanggal=$request->input('tanggal');
$jenis_lembaga=$request->input('jenis_lembaga');
$jumlah=$request->input('jumlah');
$dasar_hukum_pembentukan=$request->input('dasar_hukum_pembentukan');
$jumlah_pengurus=$request->input('jumlah_pengurus');
$ruang_lingkup_kegiatan=$request->input('ruang_lingkup_kegiatan');
$jumlah_jenis_kegiatan=$request->input('jumlah_jenis_kegiatan');
$record = LembagaMasyarakat::find($id);
if($record){
$record->tanggal = tanggalSystem($tanggal);
$record->jenis_lembaga = $jenis_lembaga;
$record->jumlah = $jumlah;
$record->dasar_hukum_pembentukan = $dasar_hukum_pembentukan;
$record->jumlah_pengurus = $jumlah_pengurus;
$record->ruang_lingkup_kegiatan = $ruang_lingkup_kegiatan;
$record->jumlah_jenis_kegiatan = $jumlah_jenis_kegiatan;
$record->save();
$request->session()->flash('notice', "Update Data Berhasil!");
return redirect(URLGroup('potensi/sdm/lembaga-masyarakat'));
}else{
throw new HttpException(404);
}
}


//fungsi hapus data LembagaMasyarakat
function deleteLembagaMasyarakat (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$record = LembagaMasyarakat::find($id);
if($record){
$record->delete();
$request->session()->flash('notice', "Hapus Data Berhasil!");
return redirect(URLGroup('potensi/sdm/lembaga-masyarakat'));
}else{
throw new HttpException(404);
}
}


}
