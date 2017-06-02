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
use App\Models\KualitasAirMinum;
class PotensiSdaKualitasAirMinumController extends Controller{

	function listKualitasAirMinum(){
		$id_desa = Auth::user()->userdesa();
		$data = KualitasAirMinum::where('id_desa',$id_desa)->get();
		$route = array("main"=>"potensi","sub"=>"kualitas-air-minum","title"=>"Potensi - Kualitas Air Minum");
		return view('desa.potensi.list-kualitas-air-minum',array("route"=>$route, "data"=>$data));
		}

		
		function newKualitasAirMinum(){
		$route = array("main"=>"potensi","sub"=>"kualitas-air-minum","title"=>"Potensi - Kualitas Air Minum");
		return view('desa.potensi.new-kualitas-air-minum',array("route"=>$route));
		}

		function editKualitasAirMinum($id){
		$data = KualitasAirMinum::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"kualitas-air-minum","title"=>"Potensi - Kualitas Air Minum");
		return view('desa.potensi.edit-kualitas-air-minum',array("route"=>$route,"data"=>$data));
		}

function insertKualitasAirMinum (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$jenis_air_minum=$request->input('jenis_air_minum');
$baik=$request->input('baik');
$berbau=$request->input('berbau');
$berwarna=$request->input('berwarna');
$berasa=$request->input('berasa');
$record = New KualitasAirMinum;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->jenis_air_minum = $jenis_air_minum;
$record->baik = $baik;
$record->berbau = $berbau;
$record->berwarna = $berwarna;
$record->berasa = $berasa;
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sda/kualitas-air-minum'));
}

//tambahkan fungsi update data KualitasAirMinum
function updateKualitasAirMinum (Request $request) {
				$id=Crypt::decrypt($request->input('id'));
				$tanggal=$request->input('tanggal');
				$jenis_air_minum=$request->input('jenis_air_minum');
				$baik=$request->input('baik');
				$berbau=$request->input('berbau');
				$berwarna=$request->input('berwarna');
				$berasa=$request->input('berasa');
				$record = KualitasAirMinum::find($id);
				if($record){
				$record->tanggal = tanggalSystem($tanggal);
				$record->jenis_air_minum = $jenis_air_minum;
				$record->baik = $baik;
				$record->berbau = $berbau;
				$record->berwarna = $berwarna;
				$record->berasa = $berasa;
				$record->save();
				$request->session()->flash('notice', "Update Data Berhasil!");
				return redirect(URLGroup('potensi/sda/kualitas-air-minum'));
				}else{
				throw new HttpException(404);
				}
}


//fungsi hapus data KualitasAirMinum
function deleteKualitasAirMinum (Request $request) {
				$id=Crypt::decrypt($request->input('id'));
				$record = KualitasAirMinum::find($id);
				if($record){
				$record->delete();
				$request->session()->flash('notice', "Hapus Data Berhasil!");
				return redirect(URLGroup('potensi/sda/kualitas-air-minum'));
				}else{
				throw new HttpException(404);
				}
				}
}