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
use App\Models\ProduksiIkanTawar;
class PotensiSdaProduksiIkanTawarController extends Controller{


public function listProduksiIkanTawar()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = ProduksiIkanTawar::where('id_desa', $id_desa)->get();
        $route   = array("main" => "potensi", "sub" => "alat-produksi-ikan-tawar", "title" => "Potensi - Alat Poduksi Budidaya Ikan Tawar");
        return view('desa.potensi.list-alat-produksi-ikan-tawar', array("route" => $route, "data" => $data));

    }

function newProduksiIkanTawar(){
		$route = array("main"=>"potensi","sub"=>"alat-produksi-ikan-tawar","title"=>"Potensi - Alat Poduksi Budidaya Ikan Tawar");
		return view('desa.potensi.new-alat-produksi-ikan-tawar',array("route"=>$route));
		}

function editProduksiIkanTawar($id)
{
		$data = ProduksiIkanTawar::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"alat-produksi-ikan-tawar","title"=>"Potensi - Alat Poduksi Budidaya Ikan Tawar");
		return view('desa.potensi.edit-alat-produksi-ikan-tawar',array("route"=>$route,"data"=>$data));
		}


function insertProduksiIkanTawar (Request $request) {
			$id_desa=$request->input('id_desa');
			$id_desa=Hashids::decode($id_desa)[0];
			$tanggal=$request->input('tanggal');
			$jenis_dan_sarana_produksi=$request->input('jenis_dan_sarana_produksi');
			$jumlah_alat_atau_luas=$request->input('jumlah_alat_atau_luas');
			$hasil_produksi_ton_pertahun=$request->input('hasil_produksi_ton_pertahun');
			$record = New ProduksiIkanTawar;
			$record->id_desa = $id_desa;
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_dan_sarana_produksi = $jenis_dan_sarana_produksi;
			$record->jumlah_alat_atau_luas = system_numerik($jumlah_alat_atau_luas);
			$record->hasil_produksi_ton_pertahun = system_numerik($hasil_produksi_ton_pertahun);
			$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
			return redirect(URLGroup('potensi/sda/alat-produksi-ikan-tawar'));
}
//tambahkan fungsi update data ProduksiIkanTawar
function updateProduksiIkanTawar (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$tanggal=$request->input('tanggal');
			$jenis_dan_sarana_produksi=$request->input('jenis_dan_sarana_produksi');
			$jumlah_alat_atau_luas=$request->input('jumlah_alat_atau_luas');
			$hasil_produksi_ton_pertahun=$request->input('hasil_produksi_ton_pertahun');
			$record = ProduksiIkanTawar::find($id);
			if($record){
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_dan_sarana_produksi = $jenis_dan_sarana_produksi;
			$record->jumlah_alat_atau_luas = system_numerik($jumlah_alat_atau_luas);
			$record->hasil_produksi_ton_pertahun = system_numerik($hasil_produksi_ton_pertahun);
			$record->save();
			$request->session()->flash('notice', "Update Data Berhasil!");
			return redirect(URLGroup('potensi/sda/alat-produksi-ikan-tawar'));
			}else{
			throw new HttpException(404);
			}
}


//fungsi hapus data ProduksiIkanTawar
function deleteProduksiIkanTawar (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$record = ProduksiIkanTawar::find($id);
			if($record){
			$record->delete();
			$request->session()->flash('notice', "Hapus Data Berhasil!");
			return redirect(URLGroup('potensi/sda/alat-produksi-ikan-tawar'));
			}else{
			throw new HttpException(404);
			}
}


}
