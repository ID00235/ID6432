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
use App\Models\KantorDesa;
class PotensiSdmKantorDesaController extends Controller{

public function listKantorDesa()
    {
        $id_desa = Auth::user()->userdesa();
        $data    = KantorDesa::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "kantor-desa", "title" => "Potensi - Kantor Desa");
        return view('desa.potensi.list-kantor-desa', array("route" => $route, "data" => $data));
    }

    public function newKantorDesa()
    {
        $route = array("main" => "potensi", "sub" => "kantor-desa", "title" => "Potensi - Kantor Desa");
        return view('desa.potensi.new-kantor-desa', array("route" => $route));
    }

    public function editKantorDesa($id)
    {
        $data  = KantorDesa::find(Hashids::decode($id)[0]);
        $route = array("main" => "potensi", "sub" => "kantor-desa", "title" => "Potensi - Kantor Desa");
        return view('desa.potensi.edit-kantor-desa', array("route" => $route, "data" => $data));
    }

function insertKantorDesa (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$gedung_kantor=$request->input('gedung_kantor');
$Jumlah_ruang_kerja_ruang=$request->input('Jumlah_ruang_kerja_ruang');
$kondisi=$request->input('kondisi');
$balai_desa_Kelurahan_atau_Sejenisnya=$request->input('balai_desa_Kelurahan_atau_Sejenisnya');
$Listrik=$request->input('Listrik');
$air_bersih=$request->input('air_bersih');
$telepon=$request->input('telepon');
$rumah_dinas_kepala_desa_atau_lurah=$request->input('rumah_dinas_kepala_desa_atau_lurah');
$rumah_dinas_perangkat=$request->input('rumah_dinas_perangkat');
$fasilitas_lainnya=$request->input('fasilitas_lainnya');
$mesin_tik_buah=$request->input('mesin_tik_buah');
$meja_buah=$request->input('meja_buah');
$kursi_buah=$request->input('kursi_buah');
$lemari_arsip_buah=$request->input('lemari_arsip_buah');
$komputer_unit=$request->input('komputer_unit');
$mesin_fax_unit=$request->input('mesin_fax_unit');
$kendaraan_dinas_unit=$request->input('kendaraan_dinas_unit');
$buku_data_peraturan_desa=$request->input('buku_data_peraturan_desa');
$buku_keputusan_kepala_desa_atau_lurah=$request->input('buku_keputusan_kepala_desa_atau_lurah');
$buku_administrasi_kependudukan=$request->input('buku_administrasi_kependudukan');
$buku_data_inventaris=$request->input('buku_data_inventaris');
$buku_data_aparat=$request->input('buku_data_aparat');
$buku_data_tanah_kas_desa=$request->input('buku_data_tanah_kas_desa');
$buku_administras_pajak_dan_retribusi=$request->input('buku_administras_pajak_dan_retribusi');
$buku_data_tanah=$request->input('buku_data_tanah');
$buku_laporan_pengaduan_masyarakat=$request->input('buku_laporan_pengaduan_masyarakat');
$buku_agenda_ekspedisi=$request->input('buku_agenda_ekspedisi');
$buku_profil_desa_dan_kelurahan=$request->input('buku_profil_desa_dan_kelurahan');
$buku_data_induk_penduduk=$request->input('buku_data_induk_penduduk');
$buku_data_mutasi_penduduk=$request->input('buku_data_mutasi_penduduk');
$buku_rekapitulasi_penduduk_akhir_bulan=$request->input('buku_rekapitulasi_penduduk_akhir_bulan');
$buku_registrasi_pelayanan_penduduk=$request->input('buku_registrasi_pelayanan_penduduk');
$buku_data_penduduk_sementara=$request->input('buku_data_penduduk_sementara');
$buku_anggaran_penerimaan=$request->input('buku_anggaran_penerimaan');
$buku_anggaran_pengeluaran_pegawai_atau_pembangunan=$request->input('buku_anggaran_pengeluaran_pegawai_atau_pembangunan');
$buku_kas_umum=$request->input('buku_kas_umum');
$buku_kas_pembantu_penerimaan=$request->input('buku_kas_pembantu_penerimaan');
$buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan=$request->input('buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan');
$buku_data_lembaga_kemasyarakatan=$request->input('buku_data_lembaga_kemasyarakatan');
$record = New KantorDesa;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->gedung_kantor = $gedung_kantor;
$record->Jumlah_ruang_kerja_ruang = system_numerik($Jumlah_ruang_kerja_ruang);
$record->kondisi = $kondisi;
$record->balai_desa_Kelurahan_atau_Sejenisnya = $balai_desa_Kelurahan_atau_Sejenisnya;
$record->Listrik = $Listrik;
$record->air_bersih = $air_bersih;
$record->telepon = $telepon;
$record->rumah_dinas_kepala_desa_atau_lurah = $rumah_dinas_kepala_desa_atau_lurah;
$record->rumah_dinas_perangkat = $rumah_dinas_perangkat;
$record->fasilitas_lainnya = $fasilitas_lainnya;
$record->mesin_tik_buah = $mesin_tik_buah;
$record->meja_buah = $meja_buah;
$record->kursi_buah = $kursi_buah;
$record->lemari_arsip_buah = $lemari_arsip_buah;
$record->komputer_unit = $komputer_unit;
$record->mesin_fax_unit = $mesin_fax_unit;
$record->kendaraan_dinas_unit = $kendaraan_dinas_unit;
$record->buku_data_peraturan_desa = $buku_data_peraturan_desa;
$record->buku_keputusan_kepala_desa_atau_lurah = $buku_keputusan_kepala_desa_atau_lurah;
$record->buku_administrasi_kependudukan = $buku_administrasi_kependudukan;
$record->buku_data_inventaris = $buku_data_inventaris;
$record->buku_data_aparat = $buku_data_aparat;
$record->buku_data_tanah_kas_desa = $buku_data_tanah_kas_desa;
$record->buku_administras_pajak_dan_retribusi = $buku_administras_pajak_dan_retribusi;
$record->buku_data_tanah = $buku_data_tanah;
$record->buku_laporan_pengaduan_masyarakat = $buku_laporan_pengaduan_masyarakat;
$record->buku_agenda_ekspedisi = $buku_agenda_ekspedisi;
$record->buku_profil_desa_dan_kelurahan = $buku_profil_desa_dan_kelurahan;
$record->buku_data_induk_penduduk = $buku_data_induk_penduduk;
$record->buku_data_mutasi_penduduk = $buku_data_mutasi_penduduk;
$record->buku_rekapitulasi_penduduk_akhir_bulan = $buku_rekapitulasi_penduduk_akhir_bulan;
$record->buku_registrasi_pelayanan_penduduk = $buku_registrasi_pelayanan_penduduk;
$record->buku_data_penduduk_sementara = $buku_data_penduduk_sementara;
$record->buku_anggaran_penerimaan = $buku_anggaran_penerimaan;
$record->buku_anggaran_pengeluaran_pegawai_atau_pembangunan = $buku_anggaran_pengeluaran_pegawai_atau_pembangunan;
$record->buku_kas_umum = $buku_kas_umum;
$record->buku_kas_pembantu_penerimaan = $buku_kas_pembantu_penerimaan;
$record->buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan = $buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan;
$record->buku_data_lembaga_kemasyarakatan = $buku_data_lembaga_kemasyarakatan;
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sdm/kantor-desa'));
}

//tambahkan fungsi update data KantorDesa
function updateKantorDesa (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$tanggal=$request->input('tanggal');
$gedung_kantor=$request->input('gedung_kantor');
$Jumlah_ruang_kerja_ruang=$request->input('Jumlah_ruang_kerja_ruang');
$kondisi=$request->input('kondisi');
$balai_desa_Kelurahan_atau_Sejenisnya=$request->input('balai_desa_Kelurahan_atau_Sejenisnya');
$Listrik=$request->input('Listrik');
$air_bersih=$request->input('air_bersih');
$telepon=$request->input('telepon');
$rumah_dinas_kepala_desa_atau_lurah=$request->input('rumah_dinas_kepala_desa_atau_lurah');
$rumah_dinas_perangkat=$request->input('rumah_dinas_perangkat');
$fasilitas_lainnya=$request->input('fasilitas_lainnya');
$mesin_tik_buah=$request->input('mesin_tik_buah');
$meja_buah=$request->input('meja_buah');
$kursi_buah=$request->input('kursi_buah');
$lemari_arsip_buah=$request->input('lemari_arsip_buah');
$komputer_unit=$request->input('komputer_unit');
$mesin_fax_unit=$request->input('mesin_fax_unit');
$kendaraan_dinas_unit=$request->input('kendaraan_dinas_unit');
$buku_data_peraturan_desa=$request->input('buku_data_peraturan_desa');
$buku_keputusan_kepala_desa_atau_lurah=$request->input('buku_keputusan_kepala_desa_atau_lurah');
$buku_administrasi_kependudukan=$request->input('buku_administrasi_kependudukan');
$buku_data_inventaris=$request->input('buku_data_inventaris');
$buku_data_aparat=$request->input('buku_data_aparat');
$buku_data_tanah_kas_desa=$request->input('buku_data_tanah_kas_desa');
$buku_administras_pajak_dan_retribusi=$request->input('buku_administras_pajak_dan_retribusi');
$buku_data_tanah=$request->input('buku_data_tanah');
$buku_laporan_pengaduan_masyarakat=$request->input('buku_laporan_pengaduan_masyarakat');
$buku_agenda_ekspedisi=$request->input('buku_agenda_ekspedisi');
$buku_profil_desa_dan_kelurahan=$request->input('buku_profil_desa_dan_kelurahan');
$buku_data_induk_penduduk=$request->input('buku_data_induk_penduduk');
$buku_data_mutasi_penduduk=$request->input('buku_data_mutasi_penduduk');
$buku_rekapitulasi_penduduk_akhir_bulan=$request->input('buku_rekapitulasi_penduduk_akhir_bulan');
$buku_registrasi_pelayanan_penduduk=$request->input('buku_registrasi_pelayanan_penduduk');
$buku_data_penduduk_sementara=$request->input('buku_data_penduduk_sementara');
$buku_anggaran_penerimaan=$request->input('buku_anggaran_penerimaan');
$buku_anggaran_pengeluaran_pegawai_atau_pembangunan=$request->input('buku_anggaran_pengeluaran_pegawai_atau_pembangunan');
$buku_kas_umum=$request->input('buku_kas_umum');
$buku_kas_pembantu_penerimaan=$request->input('buku_kas_pembantu_penerimaan');
$buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan=$request->input('buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan');
$buku_data_lembaga_kemasyarakatan=$request->input('buku_data_lembaga_kemasyarakatan');
$record = KantorDesa::find($id);
if($record){
$record->tanggal = tanggalSystem($tanggal);
$record->gedung_kantor = $gedung_kantor;
$record->Jumlah_ruang_kerja_ruang = system_numerik($Jumlah_ruang_kerja_ruang);
$record->kondisi = $kondisi;
$record->balai_desa_Kelurahan_atau_Sejenisnya = $balai_desa_Kelurahan_atau_Sejenisnya;
$record->Listrik = $Listrik;
$record->air_bersih = $air_bersih;
$record->telepon = $telepon;
$record->rumah_dinas_kepala_desa_atau_lurah = $rumah_dinas_kepala_desa_atau_lurah;
$record->rumah_dinas_perangkat = $rumah_dinas_perangkat;
$record->fasilitas_lainnya = $fasilitas_lainnya;
$record->mesin_tik_buah = $mesin_tik_buah;
$record->meja_buah = $meja_buah;
$record->kursi_buah = $kursi_buah;
$record->lemari_arsip_buah = $lemari_arsip_buah;
$record->komputer_unit = $komputer_unit;
$record->mesin_fax_unit = $mesin_fax_unit;
$record->kendaraan_dinas_unit = $kendaraan_dinas_unit;
$record->buku_data_peraturan_desa = $buku_data_peraturan_desa;
$record->buku_keputusan_kepala_desa_atau_lurah = $buku_keputusan_kepala_desa_atau_lurah;
$record->buku_administrasi_kependudukan = $buku_administrasi_kependudukan;
$record->buku_data_inventaris = $buku_data_inventaris;
$record->buku_data_aparat = $buku_data_aparat;
$record->buku_data_tanah_kas_desa = $buku_data_tanah_kas_desa;
$record->buku_administras_pajak_dan_retribusi = $buku_administras_pajak_dan_retribusi;
$record->buku_data_tanah = $buku_data_tanah;
$record->buku_laporan_pengaduan_masyarakat = $buku_laporan_pengaduan_masyarakat;
$record->buku_agenda_ekspedisi = $buku_agenda_ekspedisi;
$record->buku_profil_desa_dan_kelurahan = $buku_profil_desa_dan_kelurahan;
$record->buku_data_induk_penduduk = $buku_data_induk_penduduk;
$record->buku_data_mutasi_penduduk = $buku_data_mutasi_penduduk;
$record->buku_rekapitulasi_penduduk_akhir_bulan = $buku_rekapitulasi_penduduk_akhir_bulan;
$record->buku_registrasi_pelayanan_penduduk = $buku_registrasi_pelayanan_penduduk;
$record->buku_data_penduduk_sementara = $buku_data_penduduk_sementara;
$record->buku_anggaran_penerimaan = $buku_anggaran_penerimaan;
$record->buku_anggaran_pengeluaran_pegawai_atau_pembangunan = $buku_anggaran_pengeluaran_pegawai_atau_pembangunan;
$record->buku_kas_umum = $buku_kas_umum;
$record->buku_kas_pembantu_penerimaan = $buku_kas_pembantu_penerimaan;
$record->buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan = $buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan;
$record->buku_data_lembaga_kemasyarakatan = $buku_data_lembaga_kemasyarakatan;
$record->save();
$request->session()->flash('notice', "Update Data Berhasil!");
return redirect(URLGroup('potensi/sdm/kantor-desa'));
}else{
throw new HttpException(404);
}
}


//fungsi hapus data KantorDesa
function deleteKantorDesa (Request $request) {
$id=Crypt::decrypt($request->input('id'));
$record = KantorDesa::find($id);
if($record){
$record->delete();
$request->session()->flash('notice', "Hapus Data Berhasil!");
return redirect(URLGroup('potensi/sdm/kantor-desa'));
}else{
throw new HttpException(404);
}
}

}