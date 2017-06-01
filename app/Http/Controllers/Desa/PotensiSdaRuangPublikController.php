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
use App\Models\RuangPublik;
class PotensiSdaRuangPublikController extends Controller{

function listRuangPublik(){
		$id_desa = Auth::user()->userdesa();
		$data = RuangPublik::where('id_desa',$id_desa)->get();
		$route = array("main"=>"potensi","sub"=>"ruang-publik","title"=>"Potensi - Ruang Publik Atau Taman");
		return view('desa.potensi.list-ruang-publik',array("route"=>$route, "data"=>$data));
		}

		
		function newRuangPublik(){
		$route = array("main"=>"potensi","sub"=>"ruang-publik","title"=>"Potensi - Ruang Publik Atau Taman");
		return view('desa.potensi.new-ruang-publik',array("route"=>$route));
		}

		function editRuangPublik($id){
		$data = RuangPublik::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"ruang-publik","title"=>"Potensi - Ruang Publik Atau Taman");
		return view('desa.potensi.edit-ruang-publik',array("route"=>$route,"data"=>$data));
		}


function insertRuangPublik (Request $request) {
		$id_desa=$request->input('id_desa');
		$id_desa=Hashids::decode($id_desa)[0];
		$tanggal=$request->input('tanggal');
		$jenis_ruang_publik_atau_taman=$request->input('jenis_ruang_publik_atau_taman');
		$keberadaan=$request->input('keberadaan');
		$luas_m2=$request->input('luas_m2');
		$tingkat_pemanfaatan=$request->input('tingkat_pemanfaatan');
		$record = New RuangPublik;
		$record->id_desa = $id_desa;
		$record->tanggal = tanggalSystem($tanggal);
		$record->jenis_ruang_publik_atau_taman = $jenis_ruang_publik_atau_taman;
		$record->keberadaan = $keberadaan;
		$record->luas_m2 = system_numerik($luas_m2);
		$record->tingkat_pemanfaatan = $tingkat_pemanfaatan;
		$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
		return redirect(URLGroup('potensi/sda/ruang-publik'));
}
		//tambahkan fungsi update data RuangPublik
		function updateRuangPublik (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$tanggal=$request->input('tanggal');
		$jenis_ruang_publik_atau_taman=$request->input('jenis_ruang_publik_atau_taman');
		$keberadaan=$request->input('keberadaan');
		$luas_m2=$request->input('luas_m2');
		$tingkat_pemanfaatan=$request->input('tingkat_pemanfaatan');
		$record = RuangPublik::find($id);
		if($record){
		$record->tanggal = tanggalSystem($tanggal);
		$record->jenis_ruang_publik_atau_taman = $jenis_ruang_publik_atau_taman;
		$record->keberadaan = $keberadaan;
		$record->luas_m2 = system_numerik($luas_m2);
		$record->tingkat_pemanfaatan = $tingkat_pemanfaatan;
		$record->save();
		$request->session()->flash('notice', "Update Data Berhasil!");
		return redirect(URLGroup('potensi/sda/ruang-publik'));
		}else{
		throw new HttpException(404);
		}
		}

		//fungsi hapus data RuangPublik
		function deleteRuangPublik (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$record = RuangPublik::find($id);
		if($record){
		$record->delete();
		$request->session()->flash('notice', "Hapus Data Berhasil!");
		return redirect(URLGroup('potensi/sda/ruang-publik'));
		}else{
		throw new HttpException(404);
		}
		}

}