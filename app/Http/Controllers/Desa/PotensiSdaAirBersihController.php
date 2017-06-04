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
use App\Models\AirBersih;
class PotensiSdaAirBersihController extends Controller{

	function listAirBersih(){
		$id_desa = Auth::user()->userdesa();
		$data = AirBersih::where('id_desa',$id_desa)->orderby('tanggal','desc')->get();
		$route = array("main"=>"potensi","sub"=>"sumber-air-bersih","title"=>"Potensi - Sumber Air Bersih");
		return view('desa.potensi.list-air-bersih',array("route"=>$route, "data"=>$data));
		}

		
		function newAirBersih(){
		$route = array("main"=>"potensi","sub"=>"sumber-air-bersih","title"=>"Potensi - Sumber Air Bersih");
		return view('desa.potensi.new-air-bersih',array("route"=>$route));
		}

		function editAirBersih($id){
		$data = AirBersih::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"sumber-air-bersih","title"=>"Potensi - Sumber Air Bersih");
		return view('desa.potensi.edit-air-bersih',array("route"=>$route,"data"=>$data));
		}

		function insertAirBersih (Request $request) {
								$id_desa=$request->input('id_desa');
								$id_desa=Hashids::decode($id_desa)[0];
								$tanggal=$request->input('tanggal');
								$jenis_sumber_air_bersih=$request->input('jenis_sumber_air_bersih');
								$jumlah_unit=$request->input('jumlah_unit');
								$pemanfaatan_kk=$request->input('pemanfaatan_kk');
								$kondisi=$request->input('kondisi');
								$record = New AirBersih;
								$record->id_desa = $id_desa;
								$record->tanggal = tanggalSystem($tanggal);
								$record->jenis_sumber_air_bersih = $jenis_sumber_air_bersih;
								$record->jumlah_unit = system_numerik($jumlah_unit);
								$record->pemanfaatan_kk = system_numerik($pemanfaatan_kk);
								$record->kondisi = $kondisi;
								$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
								return redirect(URLGroup('potensi/sda/sumber-air-bersih'));
		}

		//tambahkan fungsi update data AirBersih
		function updateAirBersih (Request $request) {
								$id=Crypt::decrypt($request->input('id'));
								$tanggal=$request->input('tanggal');
								$jenis_sumber_air_bersih=$request->input('jenis_sumber_air_bersih');
								$jumlah_unit=$request->input('jumlah_unit');
								$pemanfaatan_kk=$request->input('pemanfaatan_kk');
								$kondisi=$request->input('kondisi');
								$record = AirBersih::find($id);
								if($record){
								$record->tanggal = tanggalSystem($tanggal);
								$record->jenis_sumber_air_bersih = $jenis_sumber_air_bersih;
								$record->jumlah_unit = system_numerik($jumlah_unit);
								$record->pemanfaatan_kk = system_numerik($pemanfaatan_kk);
								$record->kondisi = $kondisi;
								$record->save();
								$request->session()->flash('notice', "Update Data Berhasil!");
								return redirect(URLGroup('potensi/sda/sumber-air-bersih'));
								}else{
								throw new HttpException(404);
								}
		}


								//fungsi hapus data AirBersih
		function deleteAirBersih (Request $request) {
								$id=Crypt::decrypt($request->input('id'));
								$record = AirBersih::find($id);
								if($record){
								$record->delete();
								$request->session()->flash('notice', "Hapus Data Berhasil!");
								return redirect(URLGroup('potensi/sda/sumber-air-bersih'));
								}else{
								throw new HttpException(404);
								}
		}

}