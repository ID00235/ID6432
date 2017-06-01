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
use App\Models\DepositProduksiGalian;
class PotensiSdaDepositProduksiGalianController extends Controller{


function listDepositProduksiGalian(){
		$id_desa = Auth::user()->userdesa();
		$data = DepositProduksiGalian::where('id_desa',$id_desa)->get();
		$route = array("main"=>"potensi","sub"=>"defosit-galian","title"=>"Potensi - Deposit Produksi Galian");
		return view('desa.potensi.list-deposit-produksi-galian',array("route"=>$route, "data"=>$data));

		}

//tambah data jenis lahan
function newDepositProduksiGalian(){
			$route = array("main"=>"potensi","sub"=>"defosit-galian","title"=>"Potensi - Deposit Produksi Galian");
			return view('desa.potensi.new-deposit-produksi-galian',array("route"=>$route));
		}


function insertDepositProduksiGalian (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$id_bahan_galian=$request->input('id_bahan_galian');
$status=$request->input('status');
$hasil_produksi=$request->input('hasil_produksi');
$di_jual_langsung_ke_konsumen=$request->input('di_jual_langsung_ke_konsumen');
$di_jual_melalui_kud=$request->input('di_jual_melalui_kud');
$di_jual_melalui_tengkulak=$request->input('di_jual_melalui_tengkulak');
$di_jual_melalui_pengecer=$request->input('di_jual_melalui_pengecer');
$di_jual_ke_perusahaan=$request->input('di_jual_ke_perusahaan');
$di_jual_ke_lumbung_desa_kelurahan=$request->input('di_jual_ke_lumbung_desa_kelurahan');
$tidak_dijual=$request->input('tidak_dijual');
$kepemilikan=$request->input('kepemilikan');
$record = New DepositProduksiGalian;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->id_bahan_galian = $id_bahan_galian;
$record->status = $status;
$record->hasil_produksi = $hasil_produksi;
$record->di_jual_langsung_ke_konsumen = $di_jual_langsung_ke_konsumen;
$record->di_jual_melalui_kud = $di_jual_melalui_kud;
$record->di_jual_melalui_tengkulak = $di_jual_melalui_tengkulak;
$record->di_jual_melalui_pengecer = $di_jual_melalui_pengecer;
$record->di_jual_ke_perusahaan = $di_jual_ke_perusahaan;
$record->di_jual_ke_lumbung_desa_kelurahan = $di_jual_ke_lumbung_desa_kelurahan;
$record->tidak_dijual = $tidak_dijual;
$record->kepemilikan = $kepemilikan;
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sda/defosit-galian'));
}
















function updateDepositProduksiGalian(Request $request){

}

function deleteDepositProduksiGalian(Request $request){

}

}