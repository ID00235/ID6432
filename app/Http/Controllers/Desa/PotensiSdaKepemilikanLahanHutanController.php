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
use App\Models\KepemilikanLahanHutan;
class PotensiSdaKepemilikanLahanHutanController extends Controller{


public function listKepemilikanLahanHutan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = KepemilikanLahanHutan::where('id_desa', $id_desa)->get();
        $route   = array("main" => "potensi", "sub" => "kepemilikan-lahan-hutan", "title" => "Potensi - Kepemilikan Lahan Hutan");
        return view('desa.potensi.list-kepemilikan-lahan-hutan', array("route" => $route, "data" => $data));

    }

function newKepemilikanLahanHutan(){
		$route = array("main"=>"potensi","sub"=>"kepemilikan-lahan-hutan","title"=>"Potensi - Kepemilikan Lahan Hutan");
		return view('desa.potensi.new-kepemilikan-lahan-hutan',array("route"=>$route));
		}

function editKepemilikanLahanHutan($id){
		$data = KepemilikanLahanHutan::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"kepemilikan-lahan-hutan","title"=>"Potensi - Kepemilikan Lahan Hutan");
		return view('desa.potensi.edit-kepemilikan-lahan-hutan',array("route"=>$route,"data"=>$data));
		}

function insertKepemilikanLahanHutan (Request $request) {
		$id_desa=$request->input('id_desa');
		$id_desa=Hashids::decode($id_desa)[0];
		$tanggal=$request->input('tanggal');
		$milik_negara_ha=$request->input('milik_negara_ha');
		$milik_adat_atau_ulayat_ha=$request->input('milik_adat_atau_ulayat_ha');
		$perhutanan_instansi_sektoral_ha=$request->input('perhutanan_instansi_sektoral_ha');
		$milik_masyarakat_perorangan_ha=$request->input('milik_masyarakat_perorangan_ha');
		$luas_hutan_ha=$request->input('luas_hutan_ha');
		$record = New KepemilikanLahanHutan;
		$record->id_desa = $id_desa;
		$record->tanggal = tanggalSystem($tanggal);
		$record->milik_negara_ha = system_numerik($milik_negara_ha);
		$record->milik_adat_atau_ulayat_ha = system_numerik($milik_adat_atau_ulayat_ha);
		$record->perhutanan_instansi_sektoral_ha = system_numerik($perhutanan_instansi_sektoral_ha);
		$record->milik_masyarakat_perorangan_ha = system_numerik($milik_masyarakat_perorangan_ha);
		$record->luas_hutan_ha = $luas_hutan_ha;
		$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
		return redirect(URLGroup('potensi/sda/kepemilikan-lahan-hutan'));
}

//tambahkan fungsi update data KepemilikanLahanHutan
function updateKepemilikanLahanHutan (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$tanggal=$request->input('tanggal');
		$milik_negara_ha=$request->input('milik_negara_ha');
		$milik_adat_atau_ulayat_ha=$request->input('milik_adat_atau_ulayat_ha');
		$perhutanan_instansi_sektoral_ha=$request->input('perhutanan_instansi_sektoral_ha');
		$milik_masyarakat_perorangan_ha=$request->input('milik_masyarakat_perorangan_ha');
		$luas_hutan_ha=$request->input('luas_hutan_ha');
		$record = KepemilikanLahanHutan::find($id);
		if($record){
		$record->tanggal = tanggalSystem($tanggal);
		$record->milik_negara_ha = system_numerik($milik_negara_ha);
		$record->milik_adat_atau_ulayat_ha = system_numerik($milik_adat_atau_ulayat_ha);
		$record->perhutanan_instansi_sektoral_ha = system_numerik($perhutanan_instansi_sektoral_ha);
		$record->milik_masyarakat_perorangan_ha = system_numerik($milik_masyarakat_perorangan_ha);
		$record->luas_hutan_ha = $luas_hutan_ha;
		$record->save();
		$request->session()->flash('notice', "Update Data Berhasil!");
		return redirect(URLGroup('potensi/sda/kepemilikan-lahan-hutan'));
		}else{
		throw new HttpException(404);
		}
}


//fungsi hapus data KepemilikanLahanHutan
function deleteKepemilikanLahanHutan (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$record = KepemilikanLahanHutan::find($id);
		if($record){
		$record->delete();
		$request->session()->flash('notice', "Hapus Data Berhasil!");
		return redirect(URLGroup('potensi/sda/kepemilikan-lahan-hutan'));
		}else{
		throw new HttpException(404);
		}
}

}