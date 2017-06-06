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
use App\Models\PrasaranaAirBersih;
class PotensiSdmPrasaranaAirBersihController extends Controller{

function listPrasaranaAirBersih(){
		$id_desa = Auth::user()->userdesa();
		$data = PrasaranaAirBersih::where('id_desa',$id_desa)->orderby('tanggal','desc')->get();
		$route = array("main"=>"potensi","sub"=>"prasarana-air-bersih","title"=>"Potensi - Prasarana Air Bersih");
		return view('desa.potensi.list-prasarana-air-bersih',array("route"=>$route, "data"=>$data));
		}

		
		function newPrasaranaAirBersih(){
		$route = array("main"=>"potensi","sub"=>"prasarana-air-bersih","title"=>"Potensi - Prasarana Air Bersih");
		return view('desa.potensi.new-prasarana-air-bersih',array("route"=>$route));
		}

		function editPrasaranaAirBersih($id){
		$data = PrasaranaAirBersih::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"prasarana-air-bersih","title"=>"Potensi - Prasarana Air Bersih");
		return view('desa.potensi.edit-prasarana-air-bersih',array("route"=>$route,"data"=>$data));
		}

function insertPrasaranaAirBersih (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$sumur_pompa_unit=$request->input('sumur_pompa_unit');
$sumur_gali_unit=$request->input('sumur_gali_unit');
$hidran_umum_unit=$request->input('hidran_umum_unit');
$penampung_air_hujan_unit=$request->input('penampung_air_hujan_unit');
$tangki_air_bersih_unit=$request->input('tangki_air_bersih_unit');
$embung_unit=$request->input('embung_unit');
$mata_air_unit=$request->input('mata_air_unit');
$bangunan_pengolahan_air_unit=$request->input('bangunan_pengolahan_air_unit');
$record = New PrasaranaAirBersih;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->sumur_pompa_unit = system_numerik($sumur_pompa_unit);
$record->sumur_gali_unit = system_numerik($sumur_gali_unit);
$record->hidran_umum_unit = system_numerik($hidran_umum_unit);
$record->penampung_air_hujan_unit = system_numerik($penampung_air_hujan_unit);
$record->tangki_air_bersih_unit = system_numerik($tangki_air_bersih_unit);
$record->embung_unit = system_numerik($embung_unit);
$record->mata_air_unit = system_numerik($mata_air_unit);
$record->bangunan_pengolahan_air_unit = system_numerik($bangunan_pengolahan_air_unit);
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sdm/prasarana-air-bersih'));
}

//tambahkan fungsi update data PrasaranaAirBersih
function updatePrasaranaAirBersih (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$tanggal=$request->input('tanggal');
$sumur_pompa_unit=$request->input('sumur_pompa_unit');
$sumur_gali_unit=$request->input('sumur_gali_unit');
$hidran_umum_unit=$request->input('hidran_umum_unit');
$penampung_air_hujan_unit=$request->input('penampung_air_hujan_unit');
$tangki_air_bersih_unit=$request->input('tangki_air_bersih_unit');
$embung_unit=$request->input('embung_unit');
$mata_air_unit=$request->input('mata_air_unit');
$bangunan_pengolahan_air_unit=$request->input('bangunan_pengolahan_air_unit');
$record = PrasaranaAirBersih::find($id);
if($record){
$record->tanggal = tanggalSystem($tanggal);
$record->sumur_pompa_unit = system_numerik($sumur_pompa_unit);
$record->sumur_gali_unit = system_numerik($sumur_gali_unit);
$record->hidran_umum_unit = system_numerik($hidran_umum_unit);
$record->penampung_air_hujan_unit = system_numerik($penampung_air_hujan_unit);
$record->tangki_air_bersih_unit = system_numerik($tangki_air_bersih_unit);
$record->embung_unit = system_numerik($embung_unit);
$record->mata_air_unit = system_numerik($mata_air_unit);
$record->bangunan_pengolahan_air_unit = system_numerik($bangunan_pengolahan_air_unit);
$record->save();
$request->session()->flash('notice', "Update Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-air-bersih'));
}else{
throw new HttpException(404);
}
}


//fungsi hapus data PrasaranaAirBersih
function deletePrasaranaAirBersih (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$record = PrasaranaAirBersih::find($id);
if($record){
$record->delete();
$request->session()->flash('notice', "Hapus Data Berhasil!");
return redirect(URLGroup('potensi/sdm/prasarana-air-bersih'));
}else{
throw new HttpException(404);
}
}


}
