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
use App\Models\JenisLahan;


class PotensiSdaController extends Controller{

	function psda(Request $req){
		$route = array("main"=>"Sda","sub"=>"sda","title"=>"Potensi - Sumber Daya Alam");
		if (!$req->has('bulan_tahun')){
			$data = JenisLahan::where('id_desa',Auth::user()->userdesa())
			->orderby('tahun','desc')
			->orderby('bulan','desc')
			->first();
		}else{
			$bulan_tahun = explode("-",$req->input('bulan_tahun'));
			if (count($bulan_tahun)==2){
				$data = JenisLahan::where('id_desa',Auth::user()->userdesa())
				->where('tahun',$bulan_tahun[1])
				->where('bulan', $bulan_tahun[0])
				->first();
			}else{
				$data = array();
			}
		}
    	return view('desa.Sda.sda',array("route"=>$route, "data"=>$data));
	}
		
}

