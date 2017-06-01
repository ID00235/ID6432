<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\DepositProduksiGalian;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
//model (table) yang digunakan

class PotensiSdaDepositProduksiGalianController extends Controller
{

    public function listDepositProduksiGalian()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = DepositProduksiGalian::select(['deposit_produksi_galian.*','komuditas.nama as nama_komuditas'])
            ->where('id_desa', $id_desa)
            ->leftjoin('komuditas', 'komuditas.id', '=', 'deposit_produksi_galian.jenis_bahan_galian')
            ->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "defosit-galian", "title" => "Potensi - Deposit Produksi Bahan Galian");
        return view('desa.potensi.list-deposit-produksi-galian', array("route" => $route, "data" => $data));
    }

    public function newDepositProduksiGalian()
    {
        $route = array("main" => "potensi", "sub" => "defosit-galian", "title" => "Potensi - Deposit Produksi Bahan Galian");
        return view('desa.potensi.new-deposit-produksi-galian', array("route" => $route));
    }

    public function editDepositProduksiGalian($id)
    {
        $data  = DepositProduksiGalian::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "defosit-galian", "title" => "Potensi - Deposit Produksi Bahan Galian");
        return view('desa.potensi.edit-deposit-produksi-galian', array("route" => $route, "data" => $data));
    }

//tambah data jenis lahan
    public function insertDepositProduksiGalian(Request $request)
    {
        $id_desa                                   = $request->input('id_desa');
        $id_desa                                   = Hashids::decode($id_desa)[0];
        $tanggal                                   = $request->input('tanggal');
        $jenis_bahan_galian                        = $request->input('jenis_bahan_galian');
        $status                                    = $request->input('status');
        $hasil_produksi                            = $request->input('hasil_produksi');
        $di_jual_langsung_ke_konsumen              = $request->input('di_jual_langsung_ke_konsumen');
        $di_jual_melalui_kud                       = $request->input('di_jual_melalui_kud');
        $di_jual_melalui_tengkulak                 = $request->input('di_jual_melalui_tengkulak');
        $di_jual_melalui_pengecer                  = $request->input('di_jual_melalui_pengecer');
        $di_jual_ke_perusahaan                     = $request->input('di_jual_ke_perusahaan');
        $di_jual_ke_lumbung_desa_kelurahan         = $request->input('di_jual_ke_lumbung_desa_kelurahan');
        $tidak_dijual                              = $request->input('tidak_dijual');
        $kepemilikan                               = $request->input('kepemilikan');
        $record                                    = new DepositProduksiGalian;
        $record->id_desa                           = $id_desa;
        $record->tanggal                           = tanggalSystem($tanggal);
        $record->jenis_bahan_galian                = $jenis_bahan_galian;
        $record->status                            = $status;
        $record->hasil_produksi                    = $hasil_produksi;
        $record->di_jual_langsung_ke_konsumen      = $di_jual_langsung_ke_konsumen;
        $record->di_jual_melalui_kud               = $di_jual_melalui_kud;
        $record->di_jual_melalui_tengkulak         = $di_jual_melalui_tengkulak;
        $record->di_jual_melalui_pengecer          = $di_jual_melalui_pengecer;
        $record->di_jual_ke_perusahaan             = $di_jual_ke_perusahaan;
        $record->di_jual_ke_lumbung_desa_kelurahan = $di_jual_ke_lumbung_desa_kelurahan;
        $record->tidak_dijual                      = $tidak_dijual;
        $record->kepemilikan                       = $kepemilikan;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('potensi/sda/defosit-galian'));
    }

//tambahkan fungsi update data DepositProduksiGalian
    public function updateDepositProduksiGalian(Request $request)
    {
        $id                                = Crypt::decrypt($request->input('id'));
        $tanggal                           = $request->input('tanggal');
        $jenis_bahan_galian                = $request->input('jenis_bahan_galian');
        $status                            = $request->input('status');
        $hasil_produksi                    = $request->input('hasil_produksi');
        $di_jual_langsung_ke_konsumen      = $request->input('di_jual_langsung_ke_konsumen');
        $di_jual_melalui_kud               = $request->input('di_jual_melalui_kud');
        $di_jual_melalui_tengkulak         = $request->input('di_jual_melalui_tengkulak');
        $di_jual_melalui_pengecer          = $request->input('di_jual_melalui_pengecer');
        $di_jual_ke_perusahaan             = $request->input('di_jual_ke_perusahaan');
        $di_jual_ke_lumbung_desa_kelurahan = $request->input('di_jual_ke_lumbung_desa_kelurahan');
        $tidak_dijual                      = $request->input('tidak_dijual');
        $kepemilikan                       = $request->input('kepemilikan');
        $record                            = DepositProduksiGalian::find($id);
        if ($record) {
            $record->tanggal                           = tanggalSystem($tanggal);
            $record->jenis_bahan_galian                = $jenis_bahan_galian;
            $record->status                            = $status;
            $record->hasil_produksi                    = $hasil_produksi;
            $record->di_jual_langsung_ke_konsumen      = $di_jual_langsung_ke_konsumen;
            $record->di_jual_melalui_kud               = $di_jual_melalui_kud;
            $record->di_jual_melalui_tengkulak         = $di_jual_melalui_tengkulak;
            $record->di_jual_melalui_pengecer          = $di_jual_melalui_pengecer;
            $record->di_jual_ke_perusahaan             = $di_jual_ke_perusahaan;
            $record->di_jual_ke_lumbung_desa_kelurahan = $di_jual_ke_lumbung_desa_kelurahan;
            $record->tidak_dijual                      = $tidak_dijual;
            $record->kepemilikan                       = $kepemilikan;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('potensi/sda/defosit-galian'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data DepositProduksiGalian
    public function deleteDepositProduksiGalian(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = DepositProduksiGalian::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('potensi/sda/defosit-galian'));
        } else {
            throw new HttpException(404);
        }
    }

}
