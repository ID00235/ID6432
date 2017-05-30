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
use App\User;
//model (table) yang digunakan
use App\Models\BatasWilayah;


class PotensiUmumController  extends Controller{

	function bataswilayah(Request $req){
		$route = array("main"=>"potensi","sub"=>"batas_wilayah","title"=>"Potensi - Batas Wilayah");
		if (!$req->has('bulan_tahun')){
			$data = BatasWilayah::where('id_desa',Auth::user()->userdesa())
			->orderby('tahun','desc')
			->orderby('bulan','desc')
			->first();
		}else{
			$data = BatasWilayah::where('id_desa',Auth::user()->userdesa())
			->where('tahun', $tahun)
			->where('bulan', $bulan)
			->first();
		}
    	return view('desa.potensi.batas-wilayah',array("route"=>$route, "data"=>$data));
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
		
}