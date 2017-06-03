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
use App\Models\ProduksiIkanLaut;
class PotensiSdaProduksiIkanLautController extends Controller{


public function listProduksiIkanLaut()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = ProduksiIkanLaut::where('id_desa', $id_desa)->get();
        $route   = array("main" => "potensi", "sub" => "alat-produksi-ikan-laut", "title" => "Potensi - Alat Poduksi Budidaya Ikan Laut");
        return view('desa.potensi.list-alat-produksi-ikan-laut', array("route" => $route, "data" => $data));

    }

function newProduksiIkanLaut(){
		$route = array("main"=>"potensi","sub"=>"alat-produksi-ikan-laut","title"=>"Potensi - Alat Poduksi Budidaya Ikan Laut");
		return view('desa.potensi.new-alat-produksi-ikan-laut',array("route"=>$route));
		}

function editProduksiIkanLaut($id)
{
		$data = ProduksiIkanLaut::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"alat-produksi-ikan-laut","title"=>"Potensi - Alat Poduksi Budidaya Ikan Laut");
		return view('desa.potensi.edit-alat-produksi-ikan-laut',array("route"=>$route,"data"=>$data));
		}



function insertProduksiIkanLaut (Request $request) {
			$id_desa=$request->input('id_desa');
			$id_desa=Hashids::decode($id_desa)[0];
			$tanggal=$request->input('tanggal');
			$jenis_dan_alat_produksi=$request->input('jenis_dan_alat_produksi');
			$jumlah_alat_atau_luas=$request->input('jumlah_alat_atau_luas');
			$hasil_produksi_ton_pertahun=$request->input('hasil_produksi_ton_pertahun');
			$record = New ProduksiIkanLaut;
			$record->id_desa = $id_desa;
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_dan_alat_produksi = $jenis_dan_alat_produksi;
			$record->jumlah_alat_atau_luas = system_numerik($jumlah_alat_atau_luas);
			$record->hasil_produksi_ton_pertahun = system_numerik($hasil_produksi_ton_pertahun);
			$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
			return redirect(URLGroup('potensi/sda/alat-produksi-ikan-laut'));
}
//tambahkan fungsi update data ProduksiIkanLaut
function updateProduksiIkanLaut (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$tanggal=$request->input('tanggal');
			$jenis_dan_alat_produksi=$request->input('jenis_dan_alat_produksi');
			$jumlah_alat_atau_luas=$request->input('jumlah_alat_atau_luas');
			$hasil_produksi_ton_pertahun=$request->input('hasil_produksi_ton_pertahun');
			$record = ProduksiIkanLaut::find($id);
			if($record){
			$record->tanggal = tanggalSystem($tanggal);
			$record->jenis_dan_alat_produksi = $jenis_dan_alat_produksi;
			$record->jumlah_alat_atau_luas = system_numerik($jumlah_alat_atau_luas);
			$record->hasil_produksi_ton_pertahun = system_numerik($hasil_produksi_ton_pertahun);
			$record->save();
			$request->session()->flash('notice', "Update Data Berhasil!");
			return redirect(URLGroup('potensi/sda/alat-produksi-ikan-laut'));
			}else{
			throw new HttpException(404);
			}
}


//fungsi hapus data ProduksiIkanLaut
function deleteProduksiIkanLaut (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$record = ProduksiIkanLaut::find($id);
			if($record){
			$record->delete();
			$request->session()->flash('notice', "Hapus Data Berhasil!");
			return redirect(URLGroup('potensi/sda/alat-produksi-ikan-laut'));
			}else{
			throw new HttpException(404);
			}
			}

}
