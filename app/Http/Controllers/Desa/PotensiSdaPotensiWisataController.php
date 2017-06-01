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
use App\Models\PotensiWisata;
class PotensiSdaPotensiWisataController extends Controller{



		function listPotensiWisata(){
		$id_desa = Auth::user()->userdesa();
		$data = PotensiWisata::where('id_desa',$id_desa)->get();
		$route = array("main"=>"potensi","sub"=>"potensi-wisata","title"=>"Potensi - Potensi Wisata");
		return view('desa.potensi.list-potensi-wisata',array("route"=>$route, "data"=>$data));
		}

		
		function newPotensiWisata(){
		$route = array("main"=>"potensi","sub"=>"potensi-wisata","title"=>"Potensi - Potensi Wisata");
		return view('desa.potensi.new-potensi-wisata',array("route"=>$route));
		}

		function editPotensiWisata($id){
		$data = PotensiWisata::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"potensi-wisata","title"=>"Potensi - Potensi Wisata");
		return view('desa.potensi.edit-potensi-wisata',array("route"=>$route,"data"=>$data));
		}


		function insertPotensiWisata (Request $request) {
		$id_desa=$request->input('id_desa');
		$id_desa=Hashids::decode($id_desa)[0];
		$tanggal=$request->input('tanggal');
		$lokasi_atau_area_wisata=$request->input('lokasi_atau_area_wisata');
		$keberadaan=$request->input('keberadaan');
		$luas_ha=$request->input('luas_ha');
		$tingkat_pemanfaatan=$request->input('tingkat_pemanfaatan');
		$record = New PotensiWisata;
		$record->id_desa = $id_desa;
		$record->tanggal = tanggalSystem($tanggal);
		$record->lokasi_atau_area_wisata = $lokasi_atau_area_wisata;
		$record->keberadaan = $keberadaan;
		$record->luas_ha = system_numerik($luas_ha);
		$record->tingkat_pemanfaatan = $tingkat_pemanfaatan;
		$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
		return redirect(URLGroup('potensi/sda/potensi-wisata'));
		}

		//tambahkan fungsi update data PotensiWisata
		function updatePotensiWisata (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$tanggal=$request->input('tanggal');
		$lokasi_atau_area_wisata=$request->input('lokasi_atau_area_wisata');
		$keberadaan=$request->input('keberadaan');
		$luas_ha=$request->input('luas_ha');
		$tingkat_pemanfaatan=$request->input('tingkat_pemanfaatan');
		$record = PotensiWisata::find($id);
		if($record){
		$record->tanggal = tanggalSystem($tanggal);
		$record->lokasi_atau_area_wisata = $lokasi_atau_area_wisata;
		$record->keberadaan = $keberadaan;
		$record->luas_ha = system_numerik($luas_ha);
		$record->tingkat_pemanfaatan = $tingkat_pemanfaatan;
		$record->save();
		$request->session()->flash('notice', "Update Data Berhasil!");
		return redirect(URLGroup('potensi/sda/potensi-wisata'));
		}else{
		throw new HttpException(404);
		}
		}

		//fungsi hapus data PotensiWisata
		function deletePotensiWisata (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$record = PotensiWisata::find($id);
		if($record){
		$record->delete();
		$request->session()->flash('notice', "Hapus Data Berhasil!");
		return redirect(URLGroup('potensi/sda/potensi-wisata'));
		}else{
		throw new HttpException(404);
		}
		}
}