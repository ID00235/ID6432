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
use App\Models\DampakPengolahanHutan;
class PotensiSdaDampakPengolahanHutanController extends Controller{


 public function listDampakPengolahanHutan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = DampakPengolahanHutan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "dampak-pengolahan-hutan", "title" => "Potensi - Dampak Pengolahan Hutan");
        return view('desa.potensi.list-dampak-pengolahan-hutan', array("route" => $route, "data" => $data));
    }

    public function newDampakPengolahanHutan()
    {
        $route = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Kepemilikan Lahan Pangan");
        return view('desa.potensi.new-dampak-pengolahan-hutan', array("route" => $route));
    }

    public function editDampakPengolahanHutan($id)
    {
        $data  = DampakPengolahanHutan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "dampak-pengolahan-hutan", "title" => "Potensi - Dampak Pengolahan Hutan");
        return view('desa.potensi.edit-dampak-pengolahan-hutan', array("route" => $route, "data" => $data));
    }

    function insertDampakPengolahanHutan (Request $request) {
		$id_desa=$request->input('id_desa');
		$id_desa=Hashids::decode($id_desa)[0];
		$tanggal=$request->input('tanggal');
		$jenis_dampak=$request->input('jenis_dampak');
		$keterangan=$request->input('keterangan');
		$record = New DampakPengolahanHutan;
		$record->id_desa = $id_desa;
		$record->tanggal = tanggalSystem($tanggal);
		$record->jenis_dampak = $jenis_dampak;
		$record->keterangan = $keterangan;
		$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
		return redirect(URLGroup('potensi/sda/dampak-pengolahan-hutan'));
}

//tambahkan fungsi update data DampakPengolahanHutan
function updateDampakPengolahanHutan (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$tanggal=$request->input('tanggal');
		$jenis_dampak=$request->input('jenis_dampak');
		$keterangan=$request->input('keterangan');
		$record = DampakPengolahanHutan::find($id);
		if($record){
		$record->tanggal = tanggalSystem($tanggal);
		$record->jenis_dampak = $jenis_dampak;
		$record->keterangan = $keterangan;
		$record->save();
		$request->session()->flash('notice', "Update Data Berhasil!");
		return redirect(URLGroup('potensi/sda/dampak-pengolahan-hutan'));
		}else{
		throw new HttpException(404);
		}
}


//fungsi hapus data DampakPengolahanHutan
function deleteDampakPengolahanHutan (Request $request) {
		$id=Crypt::decrypt($request->input('id'));
		$record = DampakPengolahanHutan::find($id);
		if($record){
		$record->delete();
		$request->session()->flash('notice', "Hapus Data Berhasil!");
		return redirect(URLGroup('potensi/sda/dampak-pengolahan-hutan'));
		}else{
		throw new HttpException(404);
		}
}

}
