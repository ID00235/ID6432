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
use App\Models\JenisLahan;
class PotensiSdaJenisLahanController extends Controller{


		function listJenisLahan(){
			$id_desa = Auth::user()->userdesa();
			$data = JenisLahan::where('id_desa',$id_desa)->get();
			$route = array("main"=>"potensi","sub"=>"jenis_lahan","title"=>"Potensi - Jenis Lahan");
			return view('desa.potensi.list-jenis-lahan',array("route"=>$route, "data"=>$data));

		}


<<<<<<< HEAD


//tambah data jenis lahan
function newJenisLahan(){
			$route = array("main"=>"potensi","sub"=>"jenis_lahan","title"=>"Potensi - Jenis Lahan");
			return view('desa.potensi.new-jenis-lahan',array("route"=>$route));
		}


function insertJenisLahan (Request $request) {
$id_desa=$request->input('id_desa');
$id_desa=Hashids::decode($id_desa)[0];
$tanggal=$request->input('tanggal');
$sawah_irigasi_teknis=$request->input('sawah_irigasi_teknis');
$sawah_irigasi_setengah_teknis=$request->input('sawah_irigasi_setengah_teknis');
$sawah_tadah_hujan=$request->input('sawah_tadah_hujan');
$sawah_pasang_surut=$request->input('sawah_pasang_surut');
$luas_tanah_sawah=$request->input('luas_tanah_sawah');
$tanah_rawa=$request->input('tanah_rawa');
$pasang_surut=$request->input('pasang_surut');
$lahan_gambut=$request->input('lahan_gambut');
$situ_waduk_danau=$request->input('situ_waduk_danau');
$luas_tanah_basah=$request->input('luas_tanah_basah');
$tanah_bengkok=$request->input('tanah_bengkok');
$tanah_titi_sarah=$request->input('tanah_titi_sarah');
$kebun_desa=$request->input('kebun_desa');
$sawah_desa=$request->input('sawah_desa');
$kas_desa_kelurahan=$request->input('kas_desa_kelurahan');
$lokasi_tanah_kas_desa=$request->input('lokasi_tanah_kas_desa');
$lapangan_olahraga=$request->input('lapangan_olahraga');
$perkantoran_pemerintah=$request->input('perkantoran_pemerintah');
$ruang_publik_taman_kota=$request->input('ruang_publik_taman_kota');
$tempat_pemakaman_umum=$request->input('tempat_pemakaman_umum');
$tempat_pembuangan_sampah=$request->input('tempat_pembuangan_sampah');
$bangunan_sekolah_perguruan_tinggi=$request->input('bangunan_sekolah_perguruan_tinggi');
$pertokoan=$request->input('pertokoan');
$fasilitas_pasar=$request->input('fasilitas_pasar');
$terminal=$request->input('terminal');
$jalan=$request->input('jalan');
$daerah_tangkapan_air=$request->input('daerah_tangkapan_air');
$usaha_perikanan=$request->input('usaha_perikanan');
$sutet_aliran_listrik_tegang_tinggi=$request->input('sutet_aliran_listrik_tegang_tinggi');
$luas_tanah_fasilitas_umum=$request->input('luas_tanah_fasilitas_umum');
$tega_ladang=$request->input('tega_ladang');
$pemukiman=$request->input('pemukiman');
$pekarangan=$request->input('pekarangan');
$luas_tanah_kering=$request->input('luas_tanah_kering');
$hutan_lindung=$request->input('hutan_lindung');
$hutan_produksi_tetap=$request->input('hutan_produksi_tetap');
$hutan_produksi_terbatas=$request->input('hutan_produksi_terbatas');
$hutan_produksi=$request->input('hutan_produksi');
$hutan_konservasi=$request->input('hutan_konservasi');
$hutan_adat=$request->input('hutan_adat');
$hutan_asli=$request->input('hutan_asli');
$hutan_sekunder=$request->input('hutan_sekunder');
$hutan_buatan=$request->input('hutan_buatan');
$hutan_mangrove=$request->input('hutan_mangrove');
$suaka_alam=$request->input('suaka_alam');
$suaka_margasatwa=$request->input('suaka_margasatwa');
$hutan_suaka=$request->input('hutan_suaka');
$hutan_rakyat=$request->input('hutan_rakyat');
$luas_tanah_hutan=$request->input('luas_tanah_hutan');
$luas_desa_kelurahan=$request->input('luas_desa_kelurahan');
$total_luas_entri_data=$request->input('total_luas_entri_data');
$selisih_luas=$request->input('selisih_luas');
$record = New JenisLahan;
$record->id_desa = $id_desa;
$record->tanggal = tanggalSystem($tanggal);
$record->sawah_irigasi_teknis = system_numerik($sawah_irigasi_teknis);
$record->sawah_irigasi_setengah_teknis = system_numerik($sawah_irigasi_setengah_teknis);
$record->sawah_tadah_hujan = system_numerik($sawah_tadah_hujan);
$record->sawah_pasang_surut = system_numerik($sawah_pasang_surut);
$record->luas_tanah_sawah = system_numerik($luas_tanah_sawah);
$record->tanah_rawa = system_numerik($tanah_rawa);
$record->pasang_surut = system_numerik($pasang_surut);
$record->lahan_gambut = system_numerik($lahan_gambut);
$record->situ_waduk_danau = system_numerik($situ_waduk_danau);
$record->luas_tanah_basah = system_numerik($luas_tanah_basah);
$record->tanah_bengkok = system_numerik($tanah_bengkok);
$record->tanah_titi_sarah = system_numerik($tanah_titi_sarah);
$record->kebun_desa = system_numerik($kebun_desa);
$record->sawah_desa = system_numerik($sawah_desa);
$record->kas_desa_kelurahan = system_numerik($kas_desa_kelurahan);
$record->lokasi_tanah_kas_desa = $lokasi_tanah_kas_desa;
$record->lapangan_olahraga = system_numerik($lapangan_olahraga);
$record->perkantoran_pemerintah = system_numerik($perkantoran_pemerintah);
$record->ruang_publik_taman_kota = system_numerik($ruang_publik_taman_kota);
$record->tempat_pemakaman_umum = system_numerik($tempat_pemakaman_umum);
$record->tempat_pembuangan_sampah = system_numerik($tempat_pembuangan_sampah);
$record->bangunan_sekolah_perguruan_tinggi = system_numerik($bangunan_sekolah_perguruan_tinggi);
$record->pertokoan = system_numerik($pertokoan);
$record->fasilitas_pasar = system_numerik($fasilitas_pasar);
$record->terminal = system_numerik($terminal);
$record->jalan = system_numerik($jalan);
$record->daerah_tangkapan_air = system_numerik($daerah_tangkapan_air);
$record->usaha_perikanan = system_numerik($usaha_perikanan);
$record->sutet_aliran_listrik_tegang_tinggi = system_numerik($sutet_aliran_listrik_tegang_tinggi);
$record->luas_tanah_fasilitas_umum = system_numerik($luas_tanah_fasilitas_umum);
$record->tega_ladang = system_numerik($tega_ladang);
$record->pemukiman = system_numerik($pemukiman);
$record->pekarangan = system_numerik($pekarangan);
$record->luas_tanah_kering = system_numerik($luas_tanah_kering);
$record->hutan_lindung = system_numerik($hutan_lindung);
$record->hutan_produksi_tetap = system_numerik($hutan_produksi_tetap);
$record->hutan_produksi_terbatas = system_numerik($hutan_produksi_terbatas);
$record->hutan_produksi = system_numerik($hutan_produksi);
$record->hutan_konservasi = system_numerik($hutan_konservasi);
$record->hutan_adat = system_numerik($hutan_adat);
$record->hutan_asli = system_numerik($hutan_asli);
$record->hutan_sekunder = system_numerik($hutan_sekunder);
$record->hutan_buatan = system_numerik($hutan_buatan);
$record->hutan_mangrove = system_numerik($hutan_mangrove);
$record->suaka_alam = system_numerik($suaka_alam);
$record->suaka_margasatwa = system_numerik($suaka_margasatwa);
$record->hutan_suaka = system_numerik($hutan_suaka);
$record->hutan_rakyat = system_numerik($hutan_rakyat);
$record->luas_tanah_hutan = system_numerik($luas_tanah_hutan);
$record->luas_desa_kelurahan = $luas_desa_kelurahan;
$record->total_luas_entri_data = $total_luas_entri_data;
$record->selisih_luas = $selisih_luas;
$record->save(); $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
return redirect(URLGroup('potensi/sda/jenis-lahan'));
}

=======
		function editJenisLahan($id)
		{


		}
>>>>>>> 417d5797ef90a0263ebdf3e0a32b82360c92e23d
}


