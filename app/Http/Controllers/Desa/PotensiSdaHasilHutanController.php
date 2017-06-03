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
use App\Models\HasilHutan;
class PotensiSdaHasilHutanController extends Controller{


  public function listHasilHutan()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = HasilHutan::select(['hasil_hutan.*',
            DB::raw('year(hasil_hutan.tanggal) as tahun'), 'komuditas.nama as nama_komuditas'])
            ->where('id_desa', $id_desa)
            ->leftjoin('komuditas', 'komuditas.id', '=', 'hasil_hutan.nama_komoditas')
            ->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "hasil-hutan", "title" => "Potensi - Hasil Hutan");
        return view('desa.potensi.list-hasil-hutan', array("route" => $route, "data" => $data));
    }

    public function newHasilHutan()
    {
        $route = array("main" => "potensi", "sub" => "hasil-hutan", "title" => "Potensi - Hasil Hutan");
        return view('desa.potensi.new-hasil-hutan', array("route" => $route));
    }

    public function editHasilHutan($id)
    {
        $data  = HasilHutan::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "hasil-hutan", "title" => "Potensi - Hasil Hutan");
        return view('desa.potensi.edit-hasil-hutan', array("route" => $route, "data" => $data));
    }

    function insertHasilHutan (Request $request) {
				$id_desa=$request->input('id_desa');
				$id_desa=Hashids::decode($id_desa)[0];
				$tanggal=$request->input('tanggal');
				$nama_komoditas=$request->input('nama_komoditas');
				$hasil_produksi=$request->input('hasil_produksi');
				$satuan=$request->input('satuan');
				$dijual_langsung_ke_konsumen=$request->input('dijual_langsung_ke_konsumen');
				$dijual_kepasar=$request->input('dijual_kepasar');
				$dijual_melalui_KUD=$request->input('dijual_melalui_KUD');
				$dijual_melalui_tengkulak=$request->input('dijual_melalui_tengkulak');
				$dijual_melalui_pengecer=$request->input('dijual_melalui_pengecer');
				$dijual_ke_lumbung_desa_atau_kelurahan=$request->input('dijual_ke_lumbung_desa_atau_kelurahan');
				$tidak_dijual=$request->input('tidak_dijual');
				$record = New HasilHutan;
				$record->id_desa = $id_desa;
				$record->tanggal = tanggalSystem($tanggal);
				$record->nama_komoditas = $nama_komoditas;
				$record->hasil_produksi = system_numerik($hasil_produksi);
				$record->satuan = $satuan;
				$record->dijual_langsung_ke_konsumen = $dijual_langsung_ke_konsumen;
				$record->dijual_kepasar = $dijual_kepasar;
				$record->dijual_melalui_KUD = $dijual_melalui_KUD;
				$record->dijual_melalui_tengkulak = $dijual_melalui_tengkulak;
				$record->dijual_melalui_pengecer = $dijual_melalui_pengecer;
				$record->dijual_ke_lumbung_desa_atau_kelurahan = $dijual_ke_lumbung_desa_atau_kelurahan;
				$record->tidak_dijual = $tidak_dijual;
				$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
				return redirect(URLGroup('potensi/sda/hasil-hutan'));
}

//tambahkan fungsi update data HasilHutan
function updateHasilHutan (Request $request) {
				$id=Crypt::decrypt($request->input('id'));
				$tanggal=$request->input('tanggal');
				$nama_komoditas=$request->input('nama_komoditas');
				$hasil_produksi=$request->input('hasil_produksi');
				$satuan=$request->input('satuan');
				$dijual_langsung_ke_konsumen=$request->input('dijual_langsung_ke_konsumen');
				$dijual_kepasar=$request->input('dijual_kepasar');
				$dijual_melalui_KUD=$request->input('dijual_melalui_KUD');
				$dijual_melalui_tengkulak=$request->input('dijual_melalui_tengkulak');
				$dijual_melalui_pengecer=$request->input('dijual_melalui_pengecer');
				$dijual_ke_lumbung_desa_atau_kelurahan=$request->input('dijual_ke_lumbung_desa_atau_kelurahan');
				$tidak_dijual=$request->input('tidak_dijual');
				$record = HasilHutan::find($id);
				if($record){
				$record->tanggal = tanggalSystem($tanggal);
				$record->nama_komoditas = $nama_komoditas;
				$record->hasil_produksi = system_numerik($hasil_produksi);
				$record->satuan = $satuan;
				$record->dijual_langsung_ke_konsumen = $dijual_langsung_ke_konsumen;
				$record->dijual_kepasar = $dijual_kepasar;
				$record->dijual_melalui_KUD = $dijual_melalui_KUD;
				$record->dijual_melalui_tengkulak = $dijual_melalui_tengkulak;
				$record->dijual_melalui_pengecer = $dijual_melalui_pengecer;
				$record->dijual_ke_lumbung_desa_atau_kelurahan = $dijual_ke_lumbung_desa_atau_kelurahan;
				$record->tidak_dijual = $tidak_dijual;
				$record->save();
				$request->session()->flash('notice', "Update Data Berhasil!");
				return redirect(URLGroup('potensi/sda/hasil-hutan'));
				}else{
				throw new HttpException(404);
				}
}


//fungsi hapus data HasilHutan
function deleteHasilHutan (Request $request) {
				$id=Crypt::decrypt($request->input('id'));
				$record = HasilHutan::find($id);
				if($record){
				$record->delete();
				$request->session()->flash('notice', "Hapus Data Berhasil!");
				return redirect(URLGroup('potensi/sda/hasil-hutan'));
				}else{
				throw new HttpException(404);
				}
}


}
