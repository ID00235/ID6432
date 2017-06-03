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
use App\Models\JenisProduksiIkan;
class PotensiSdaJenisProduksiIkanController extends Controller{

function listJenisProduksiIkan(){
		$id_desa = Auth::user()->userdesa();
		$data  = JenisProduksiIkan::select(['jenis_produksi_ikan.*',
            DB::raw('year(jenis_produksi_ikan.tanggal) as tahun'),'komuditas.nama as namaikan'])
            ->where('id_desa', $id_desa)
            ->leftjoin('komuditas', 'komuditas.id', '=', 'jenis_produksi_ikan.nama_ikan')
            ->orderby('tanggal', 'desc')->get();
		$route = array("main"=>"potensi","sub"=>"jenis-produksi-ikan","title"=>"Potensi - Jenis Produksi Ikan");
		return view('desa.potensi.list-jenis-produksi-ikan',array("route"=>$route, "data"=>$data));
		}

		
		function newJenisProduksiIkan(){
		$route = array("main"=>"potensi","sub"=>"jenis-produksi-ikan","title"=>"Potensi - Jenis Produksi Ikan");
		return view('desa.potensi.new-jenis-produksi-ikan',array("route"=>$route));
		}

		function editJenisProduksiIkan($id){
		$data = JenisProduksiIkan::find(Hashids::decode($id)[0]);
		$route = array("main"=>"potensi","sub"=>"jenis-produksi-ikan","title"=>"Potensi - Jenis Produksi Ikan");
		return view('desa.potensi.edit-jenis-produksi-ikan',array("route"=>$route,"data"=>$data));
		}



function insertJenisProduksiIkan (Request $request) {
			$id_desa=$request->input('id_desa');
			$id_desa=Hashids::decode($id_desa)[0];
			$tanggal=$request->input('tanggal');
			$nama_ikan=$request->input('nama_ikan');
			$hasil_produksi_ton_pertahun=$request->input('hasil_produksi_ton_pertahun');
			$harga_jual_rp_perton=$request->input('harga_jual_rp_perton');
			$nilai_produksi_rp=$request->input('nilai_produksi_rp');
			$nilai_bahan_baku_yang_rp=$request->input('nilai_bahan_baku_yang_rp');
			$nilai_bahan_penolong_yang_rp=$request->input('nilai_bahan_penolong_yang_rp');
			$biaya_antara_yang_dihabiskan_rp=$request->input('biaya_antara_yang_dihabiskan_rp');
			$saldo_produksi_rp=$request->input('saldo_produksi_rp');
			$jumlah_jenis_usaha_perikanan=$request->input('jumlah_jenis_usaha_perikanan');
			$dijual_langsung_ke_konsumen=$request->input('dijual_langsung_ke_konsumen');
			$dijual_ke_pasar_desa_kelurahan=$request->input('dijual_ke_pasar_desa_kelurahan');
			$dijual_melalui_KUD=$request->input('dijual_melalui_KUD');
			$dijual_melalui_tengkulak=$request->input('dijual_melalui_tengkulak');
			$dijual_melalui_pengecer=$request->input('dijual_melalui_pengecer');
			$dijual_ke_lumbung_desa_kelurahan=$request->input('dijual_ke_lumbung_desa_kelurahan');
			$tidak_dijual=$request->input('tidak_dijual');
			$record = New JenisProduksiIkan;
			$record->id_desa = $id_desa;
			$record->tanggal = tanggalSystem($tanggal);
			$record->nama_ikan = $nama_ikan;
			$record->hasil_produksi_ton_pertahun = system_numerik($hasil_produksi_ton_pertahun);
			$record->harga_jual_rp_perton = system_numerik($harga_jual_rp_perton);
			$record->nilai_produksi_rp = $nilai_produksi_rp;
			$record->nilai_bahan_baku_yang_rp = system_numerik($nilai_bahan_baku_yang_rp);
			$record->nilai_bahan_penolong_yang_rp = system_numerik($nilai_bahan_penolong_yang_rp);
			$record->biaya_antara_yang_dihabiskan_rp = system_numerik($biaya_antara_yang_dihabiskan_rp);
			$record->saldo_produksi_rp = $saldo_produksi_rp;
			$record->jumlah_jenis_usaha_perikanan = system_numerik($jumlah_jenis_usaha_perikanan);
			$record->dijual_langsung_ke_konsumen = $dijual_langsung_ke_konsumen;
			$record->dijual_ke_pasar_desa_kelurahan = $dijual_ke_pasar_desa_kelurahan;
			$record->dijual_melalui_KUD = $dijual_melalui_KUD;
			$record->dijual_melalui_tengkulak = $dijual_melalui_tengkulak;
			$record->dijual_melalui_pengecer = $dijual_melalui_pengecer;
			$record->dijual_ke_lumbung_desa_kelurahan = $dijual_ke_lumbung_desa_kelurahan;
			$record->tidak_dijual = $tidak_dijual;
			$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
			return redirect(URLGroup('potensi/sda/jenis-produksi-ikan'));
			}

			//tambahkan fungsi update data JenisProduksiIkan
function updateJenisProduksiIkan (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$tanggal=$request->input('tanggal');
			$nama_ikan=$request->input('nama_ikan');
			$hasil_produksi_ton_pertahun=$request->input('hasil_produksi_ton_pertahun');
			$harga_jual_rp_perton=$request->input('harga_jual_rp_perton');
			$nilai_produksi_rp=$request->input('nilai_produksi_rp');
			$nilai_bahan_baku_yang_rp=$request->input('nilai_bahan_baku_yang_rp');
			$nilai_bahan_penolong_yang_rp=$request->input('nilai_bahan_penolong_yang_rp');
			$biaya_antara_yang_dihabiskan_rp=$request->input('biaya_antara_yang_dihabiskan_rp');
			$saldo_produksi_rp=$request->input('saldo_produksi_rp');
			$jumlah_jenis_usaha_perikanan=$request->input('jumlah_jenis_usaha_perikanan');
			$dijual_langsung_ke_konsumen=$request->input('dijual_langsung_ke_konsumen');
			$dijual_ke_pasar_desa_kelurahan=$request->input('dijual_ke_pasar_desa_kelurahan');
			$dijual_melalui_KUD=$request->input('dijual_melalui_KUD');
			$dijual_melalui_tengkulak=$request->input('dijual_melalui_tengkulak');
			$dijual_melalui_pengecer=$request->input('dijual_melalui_pengecer');
			$dijual_ke_lumbung_desa_kelurahan=$request->input('dijual_ke_lumbung_desa_kelurahan');
			$tidak_dijual=$request->input('tidak_dijual');
			$record = JenisProduksiIkan::find($id);
			if($record){
			$record->tanggal = tanggalSystem($tanggal);
			$record->nama_ikan = $nama_ikan;
			$record->hasil_produksi_ton_pertahun = system_numerik($hasil_produksi_ton_pertahun);
			$record->harga_jual_rp_perton = system_numerik($harga_jual_rp_perton);
			$record->nilai_produksi_rp = $nilai_produksi_rp;
			$record->nilai_bahan_baku_yang_rp = system_numerik($nilai_bahan_baku_yang_rp);
			$record->nilai_bahan_penolong_yang_rp = system_numerik($nilai_bahan_penolong_yang_rp);
			$record->biaya_antara_yang_dihabiskan_rp = system_numerik($biaya_antara_yang_dihabiskan_rp);
			$record->saldo_produksi_rp = $saldo_produksi_rp;
			$record->jumlah_jenis_usaha_perikanan = system_numerik($jumlah_jenis_usaha_perikanan);
			$record->dijual_langsung_ke_konsumen = $dijual_langsung_ke_konsumen;
			$record->dijual_ke_pasar_desa_kelurahan = $dijual_ke_pasar_desa_kelurahan;
			$record->dijual_melalui_KUD = $dijual_melalui_KUD;
			$record->dijual_melalui_tengkulak = $dijual_melalui_tengkulak;
			$record->dijual_melalui_pengecer = $dijual_melalui_pengecer;
			$record->dijual_ke_lumbung_desa_kelurahan = $dijual_ke_lumbung_desa_kelurahan;
			$record->tidak_dijual = $tidak_dijual;
			$record->save();
			$request->session()->flash('notice', "Update Data Berhasil!");
			return redirect(URLGroup('potensi/sda/jenis-produksi-ikan'));
			}else{
			throw new HttpException(404);
}
}


//fungsi hapus data JenisProduksiIkan
function deleteJenisProduksiIkan (Request $request) {
			$id=Crypt::decrypt($request->input('id'));
			$record = JenisProduksiIkan::find($id);
			if($record){
			$record->delete();
			$request->session()->flash('notice', "Hapus Data Berhasil!");
			return redirect(URLGroup('potensi/sda/jenis-produksi-ikan'));
			}else{
			throw new HttpException(404);
			}
}

}