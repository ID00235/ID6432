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
use App\Models\AirPanas;
class PotensiSdaAirPanasController extends Controller{

public function listAirPanas()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = AirPanas::where('id_desa', $id_desa)->get();
        $route   = array("main" => "potensi", "sub" => "air-panas", "title" => "Potensi - Air Panas");
        return view('desa.potensi.list-air-panas', array("route" => $route, "data" => $data));

    }

function newAirPanas(){
		$route = array("main"=>"potensi","sub"=>"air-panas","title"=>"Potensi - Air Panas");
		return view('desa.potensi.new-air-panas',array("route"=>$route));
		}

function editAirPanas($id){
		$data = AirPanas::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"air-panas","title"=>"Potensi - Air Panas");
		return view('desa.potensi.edit-air-panas',array("route"=>$route,"data"=>$data));
		}

function insertAirPanas (Request $request) {
			$id_desa=$request->input('id_desa');
			$id_desa=Hashids::decode($id_desa)[0];
			$tanggal=$request->input('tanggal');
			$jenis_sumber=$request->input('jenis_sumber');
			$jumlah_lokasi=$request->input('jumlah_lokasi');
			$pemanfaatan=$request->input('pemanfaatan');
			$kepemilikan=$request->input('kepemilikan');
			$record = New AirPanas;
			$record->id_desa = $id_desa;
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_sumber = $jenis_sumber;
			$record->jumlah_lokasi = system_numerik($jumlah_lokasi);
			$record->pemanfaatan = $pemanfaatan;
			$record->kepemilikan = $kepemilikan;
			$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
			return redirect(URLGroup('potensi/sda/air-panas'));
}
//tambahkan fungsi update data AirPanas
			function updateAirPanas (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$tanggal=$request->input('tanggal');
			$jenis_sumber=$request->input('jenis_sumber');
			$jumlah_lokasi=$request->input('jumlah_lokasi');
			$pemanfaatan=$request->input('pemanfaatan');
			$kepemilikan=$request->input('kepemilikan');
			$record = AirPanas::find($id);
			if($record){
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_sumber = $jenis_sumber;
			$record->jumlah_lokasi = system_numerik($jumlah_lokasi);
			$record->pemanfaatan = $pemanfaatan;
			$record->kepemilikan = $kepemilikan;
			$record->save();
			$request->session()->flash('notice', "Update Data Berhasil!");
			return redirect(URLGroup('potensi/sda/air-panas'));
			}else{
			throw new HttpException(404);
			}
}
//fungsi hapus data AirPanas
function deleteAirPanas (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$record = AirPanas::find($id);
			if($record){
			$record->delete();
			$request->session()->flash('notice', "Hapus Data Berhasil!");
			return redirect(URLGroup('potensi/sda/air-panas'));
			}else{
			throw new HttpException(404);
			}
}
}