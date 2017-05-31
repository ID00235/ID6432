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
use App\Models\BatasWilayah;


class PotensiUmumController extends Controller{

	function bataswilayah(Request $req){
		$route = array("main"=>"potensi","sub"=>"batas_wilayah","title"=>"Potensi - Batas Wilayah");
		if (!$req->has('bulan_tahun')){
			$data = BatasWilayah::where('id_desa',Auth::user()->userdesa())
			->orderby('tahun','desc')
			->orderby('bulan','desc')
			->first();
		}else{
			$bulan_tahun = explode("-",$req->input('bulan_tahun'));
			if (count($bulan_tahun)==2){
				$data = BatasWilayah::where('id_desa',Auth::user()->userdesa())
				->where('tahun', $bulan_tahun[1])
				->where('bulan', $bulan_tahun[0])
				->first();
			}else{
				$data = array();
			}
		}
    	return view('desa.potensi.batas-wilayah',array("route"=>$route, "data"=>$data));
	}


	function editbataswilayah($id){
		$route = array("main"=>"potensi","sub"=>"batas-wilayah","title"=>"Edit - Batas Wilayah");
		$id = Hashids::decode($id)[0];
		$data = BatasWilayah::find($id);
    	return view('desa.potensi.edit-batas-wilayah',array("route"=>$route, "data"=>$data));
	}

	function insertbataswilayah(Request $R){
		$querystring = $R->input('querystring');
		$id_desa = Crypt::decrypt($R->input('id_desa'));
		$tahun = $R->input('tahun');
		$bulan = $R->input('bulan');
		$tahun_pembentukan = $R->input('tahun_pembentukan');
		$luas_desa = $R->input('luas_desa');
		$nama_kepala_desa = $R->input('nama_kepala_desa');
		$desa_sebelah_utara = $R->input('desa_sebelah_utara');
		$desa_sebelah_timur = $R->input('desa_sebelah_timur');
		$desa_sebelah_selatan = $R->input('desa_sebelah_selatan');
		$desa_sebelah_barat = $R->input('desa_sebelah_barat');

		$kecamatan_sebelah_utara = $R->input('kecamatan_sebelah_utara');
		$kecamatan_sebelah_timur = $R->input('kecamatan_sebelah_timur');
		$kecamatan_sebelah_selatan = $R->input('kecamatan_sebelah_selatan');
		$kecamatan_sebelah_barat = $R->input('kecamatan_sebelah_barat');
		$penetapan_batas = $R->input('penetapan_batas');
		$perdes_no = $R->input('perdes_no');
		$perda_no = $R->input('perda_no');
		$peta_wilayah = $R->input('peta_wilayah');

		$batas = new BatasWilayah;
		$batas->id_desa = $id_desa;
		$batas->tahun = $tahun;
		$batas->bulan = $bulan;
		$batas->tahun_pembentukan = $tahun_pembentukan;
		$batas->luas_desa = system_numerik($luas_desa);
		$batas->nama_kepala_desa = $nama_kepala_desa;
		$batas->desa_sebelah_utara = $desa_sebelah_utara;
		$batas->desa_sebelah_timur = $desa_sebelah_timur;
		$batas->desa_sebelah_selatan = $desa_sebelah_selatan;
		$batas->desa_sebelah_barat = $desa_sebelah_barat;
		$batas->kecamatan_sebelah_utara = $kecamatan_sebelah_utara;
		$batas->kecamatan_sebelah_timur = $kecamatan_sebelah_timur;
		$batas->kecamatan_sebelah_selatan = $kecamatan_sebelah_selatan;
		$batas->kecamatan_sebelah_barat = $kecamatan_sebelah_barat;
		$batas->penetapan_batas = $penetapan_batas;
		$batas->perdes_no = $perdes_no;
		$batas->perda_no = $perda_no;
		$batas->peta_wilayah = $peta_wilayah;
		$batas->save();
		$R->session()->flash('notice', "<p>Data Batas Wilayah Berhasil Disimpan!</p>");
		if($querystring){
			return redirect(URLGroup('potensi/batas_wilayah?'.$querystring));
		}else{
			return redirect(URLGroup('potensi/batas_wilayah'));
		}
	}

	function updateBatasWilayah (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$bulan=$request->input('bulan');
		$tahun=$request->input('tahun');
		$tahun_pembentukan=$request->input('tahun_pembentukan');
		$luas_desa=$request->input('luas_desa');
		$nama_kepala_desa=$request->input('nama_kepala_desa');
		$desa_sebelah_utara=$request->input('desa_sebelah_utara');
		$desa_sebelah_timur=$request->input('desa_sebelah_timur');
		$desa_sebelah_selatan=$request->input('desa_sebelah_selatan');
		$desa_sebelah_barat=$request->input('desa_sebelah_barat');
		$kecamatan_sebelah_utara=$request->input('kecamatan_sebelah_utara');
		$kecamatan_sebelah_timur=$request->input('kecamatan_sebelah_timur');
		$kecamatan_sebelah_selatan=$request->input('kecamatan_sebelah_selatan');
		$kecamatan_sebelah_barat=$request->input('kecamatan_sebelah_barat');
		$penetapan_batas=$request->input('penetapan_batas');
		$perdes_no=$request->input('perdes_no');
		$perda_no=$request->input('perda_no');
		$peta_wilayah=$request->input('peta_wilayah');
		$record = BatasWilayah::find($id);
		if($record){
		$record->bulan = $bulan;
		$record->tahun = $tahun;
		$record->tahun_pembentukan = $tahun_pembentukan;
		$record->luas_desa = system_numerik($luas_desa);
		$record->nama_kepala_desa = $nama_kepala_desa;
		$record->desa_sebelah_utara = $desa_sebelah_utara;
		$record->desa_sebelah_timur = $desa_sebelah_timur;
		$record->desa_sebelah_selatan = $desa_sebelah_selatan;
		$record->desa_sebelah_barat = $desa_sebelah_barat;
		$record->kecamatan_sebelah_utara = $kecamatan_sebelah_utara;
		$record->kecamatan_sebelah_timur = $kecamatan_sebelah_timur;
		$record->kecamatan_sebelah_selatan = $kecamatan_sebelah_selatan;
		$record->kecamatan_sebelah_barat = $kecamatan_sebelah_barat;
		$record->penetapan_batas = $penetapan_batas;
		$record->perdes_no = $perdes_no;
		$record->perda_no = $perda_no;
		$record->peta_wilayah = $peta_wilayah;
		$record->save(); $request->session()->flash('notice', "Update Data Berhasil!");
		return redirect(URLGroup('potensi/batas-wilayah'));
		}else{
		throw new HttpException(404);
		}
	}

	function deleteBatasWilayah (Request $request){
		$id=Crypt::decrypt($request->input('id'));
		$record = BatasWilayah::find($id);
		$record->delete();
		$request->session()->flash('notice', "Data Berhasil  Dihapus!");
		return redirect(URLGroup('potensi/batas-wilayah'));
	}
		
}