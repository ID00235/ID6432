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
use App\Models\ApotikHidup;
class PotensiSdaApotikHidupController extends Controller{


		function listApotikHidup(){
		$id_desa = Auth::user()->userdesa();
		$data = ApotikHidup::where('id_desa',$id_desa)->get();
		$route = array("main"=>"potensi","sub"=>"apotik-hidup","title"=>"Potensi - Apotik Hidup");
		return view('desa.potensi.list-apotik-hidup',array("route"=>$route, "data"=>$data));
		}

		
		function newApotikHidup(){
		$route = array("main"=>"potensi","sub"=>"apotik-hidup","title"=>"Potensi - Apotik Hidup");
		return view('desa.potensi.new-apotik-hidup',array("route"=>$route));
		}

		function editApotikHidup($id){
		$data = ApotikHidup::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"apotik-hidup","title"=>"Potensi - Apotik Hidup");
		return view('desa.potensi.edit-apotik-hidup',array("route"=>$route,"data"=>$data));
		}

		function insertApotikHidup (Request $request) {
					$id_desa=$request->input('id_desa');
					$id_desa=Hashids::decode($id_desa)[0];
					$tanggal=$request->input('tanggal');
					$nama_tanaman_apotik_hidup=$request->input('nama_tanaman_apotik_hidup');
					$luas_produksi_ha=$request->input('luas_produksi_ha');
					$hasil_produksi_ha=$request->input('hasil_produksi_ha');
					$jumlah_produksi_ton=$request->input('jumlah_produksi_ton');
					$record = New ApotikHidup;
					$record->id_desa = $id_desa;
					$record->tanggal = tanggalSystem($tanggal);
					$record->nama_tanaman_apotik_hidup = $nama_tanaman_apotik_hidup;
					$record->luas_produksi_ha = system_numerik($luas_produksi_ha);
					$record->hasil_produksi_ha = system_numerik($hasil_produksi_ha);
					$record->jumlah_produksi_ton = $jumlah_produksi_ton;
					$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
					return redirect(URLGroup('potensi/sda/apotik-hidup'));
		}

		//tambahkan fungsi update data ApotikHidup
		function updateApotikHidup (Request $request) {
					$id=Crypt::decrypt($request->input('id'));
					$tanggal=$request->input('tanggal');
					$nama_tanaman_apotik_hidup=$request->input('nama_tanaman_apotik_hidup');
					$luas_produksi_ha=$request->input('luas_produksi_ha');
					$hasil_produksi_ha=$request->input('hasil_produksi_ha');
					$jumlah_produksi_ton=$request->input('jumlah_produksi_ton');
					$record = ApotikHidup::find($id);
					if($record){
					$record->tanggal = tanggalSystem($tanggal);
					$record->nama_tanaman_apotik_hidup = $nama_tanaman_apotik_hidup;
					$record->luas_produksi_ha = system_numerik($luas_produksi_ha);
					$record->hasil_produksi_ha = system_numerik($hasil_produksi_ha);
					$record->jumlah_produksi_ton = $jumlah_produksi_ton;
					$record->save();
					$request->session()->flash('notice', "Update Data Berhasil!");
					return redirect(URLGroup('potensi/sda/apotik-hidup'));
					}else{
					throw new HttpException(404);
					}
		}

					//fungsi hapus data ApotikHidup
		function deleteApotikHidup (Request $request) {
					$id=Crypt::decrypt($request->input('id'));
					$record = ApotikHidup::find($id);
					if($record){
					$record->delete();
					$request->session()->flash('notice', "Hapus Data Berhasil!");
					return redirect(URLGroup('potensi/sda/apotik-hidup'));
					}else{
					throw new HttpException(404);
					}
		}




}
