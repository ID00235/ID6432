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
use App\Models\KondisiHutan;
class PotensiSdaKondisiHutanController extends Controller{


 public function listKondisiHutan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = KondisiHutan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "kondisi-hutan", "title" => "Potensi - Kondisi Hutan");
        return view('desa.potensi.list-kondisi-hutan', array("route" => $route, "data" => $data));
    }

    public function newKondisiHutan()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Kepemilikan Lahan Pangan");
        return view('desa.potensi.new-kondisi-hutan', array("route" => $route));
    }

    public function editKondisiHutan($id)
    {
        $data  = KondisiHutan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "kondisi-hutan", "title" => "Potensi - Kondisi Hutan");
        return view('desa.potensi.edit-kondisi-hutan', array("route" => $route, "data" => $data));
    }

function insertKondisiHutan (Request $request) {
			$id_desa=$request->input('id_desa');
			$id_desa=Hashids::decode($id_desa)[0];
			$tanggal=$request->input('tanggal');
			$jenis_hutan=$request->input('jenis_hutan');
			$kondisi_baik_ha=$request->input('kondisi_baik_ha');
			$kondisi_rusak_ha=$request->input('kondisi_rusak_ha');
			$jumlah_luas_hutan_ha=$request->input('jumlah_luas_hutan_ha');
			$record = New KondisiHutan;
			$record->id_desa = $id_desa;
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_hutan = $jenis_hutan;
			$record->kondisi_baik_ha = system_numerik($kondisi_baik_ha);
			$record->kondisi_rusak_ha = system_numerik($kondisi_rusak_ha);
			$record->jumlah_luas_hutan_ha = $jumlah_luas_hutan_ha;
			$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
			return redirect(URLGroup('potensi/sda/kondisi-hutan'));
}

function updateKondisiHutan (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$tanggal=$request->input('tanggal');
			$jenis_hutan=$request->input('jenis_hutan');
			$kondisi_baik_ha=$request->input('kondisi_baik_ha');
			$kondisi_rusak_ha=$request->input('kondisi_rusak_ha');
			$jumlah_luas_hutan_ha=$request->input('jumlah_luas_hutan_ha');
			$record = KondisiHutan::find($id);
			if($record){
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_hutan = $jenis_hutan;
			$record->kondisi_baik_ha = system_numerik($kondisi_baik_ha);
			$record->kondisi_rusak_ha = system_numerik($kondisi_rusak_ha);
			$record->jumlah_luas_hutan_ha = $jumlah_luas_hutan_ha;
			$record->save();
			$request->session()->flash('notice', "Update Data Berhasil!");
			return redirect(URLGroup('potensi/sda/kondisi-hutan'));
			}else{
			throw new HttpException(404);
			}
}


//fungsi hapus data KondisiHutan
function deleteKondisiHutan (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$record = KondisiHutan::find($id);
			if($record){
			$record->delete();
			$request->session()->flash('notice', "Hapus Data Berhasil!");
			return redirect(URLGroup('potensi/sda/kondisi-hutan'));
			}else{
			throw new HttpException(404);
			}
}


}