<?php
namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\AnggotaKeluarga;
use App\Models\KepalaKeluarga;
use App\Models\KesejahteraanKeluarga;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\Datatables\Datatables;

//model (table) yang digunakan

class DdkKepalaKeluargaController extends Controller
{

    public function listKepalaKeluarga()
    {
        $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Kepala Keluarga");
        return view('desa.ddk.list-kepala-keluarga', array("route" => $route));
    }

    public function datatable(Request $request)
    {
        $id_desa = Auth::user()->userdesa();
        $query   = KepalaKeluarga::select(['kepala_keluarga.*'])
            ->where('id_desa', $id_desa);

        return Datatables::of($query)
            ->filter(function ($filter) {
                if (request()->has('search')) {
                    $keyword = request('search');
                    $keyword = $keyword['value'];
                    if ($keyword != "") {
                        $filter->whereRaw("nama_kepala_keluarga LIKE '%$keyword%'  or nomor_kk LIKE '%$keyword%'  ");
                    }

                }

            })
            ->addIndexColumn()
            ->addColumn('hashid', function ($row) {
                $id = Hashids::encode($row->id);
                return $id;
            })
            ->editColumn('tanggal', function ($row) {
                return tanggalIndo($row->tanggal);
            })
            ->removeColumn('id_desa')
            ->removeColumn('created_at')
            ->removeColumn('update_at')
            ->make(true);
    }

    public function newKepalaKeluarga()
    {
        $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Kepala Keluarga");
        return view('desa.ddk.new-kepala-keluarga', array("route" => $route));
    }

    public function editKepalaKeluarga($id)
    {
        $data  = KepalaKeluarga::find(Hashids::decode($id)[0]);
        $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Kepala Keluarga");
        return view('desa.ddk.edit-kepala-keluarga', array("route" => $route, "data" => $data));
    }

    public function anggotakeluarga($id)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $data = AnggotaKeluarga::select(['anggota_keluarga.*', 'pendidikan.nama_pendidikan', 'pekerjaan.nama_pekerjaan'])
                ->join('pendidikan', 'pendidikan.id', '=', 'anggota_keluarga.pendidikan')
                ->join('pekerjaan', 'pekerjaan.id', '=', 'anggota_keluarga.pekerjaan')
                ->where('id_kk', $kk->id)->orderby('no_urut', 'asc')->get();
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Anggota Keluarga");
            return view('desa.ddk.list-anggota-keluarga', array("route" => $route, "data" => $data, "kepala_keluarga" => $kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function anggotakeluargabaru($id)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Anggota Keluarga Baru");
            return view('desa.ddk.new-anggota-keluarga', array("route" => $route, "kepala_keluarga" => $kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function editanggotakeluarga($id, $ak)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Anggota Keluarga Baru");
            $data  = AnggotaKeluarga::find(Hashids::decode($ak)[0]);
            return view('desa.ddk.edit-anggota-keluarga', array("route" => $route, "kepala_keluarga" => $kk, "data" => $data));
        } else {
            throw new HttpException(404);
        }
    }

    public function detailanggotakeluarga($id, $ak)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Anggota Keluarga Baru");
            $data  = AnggotaKeluarga::select(['anggota_keluarga.*', 'pendidikan.nama_pendidikan', 'pekerjaan.nama_pekerjaan'])
                ->join('pendidikan', 'pendidikan.id', '=', 'anggota_keluarga.pendidikan')
                ->join('pekerjaan', 'pekerjaan.id', '=', 'anggota_keluarga.pekerjaan')
                ->where('anggota_keluarga.id', Hashids::decode($ak)[0])->first();
            return view('desa.ddk.detail-anggota-keluarga', array("route" => $route, "kepala_keluarga" => $kk, "data" => $data));
        } else {
            throw new HttpException(404);
        }
    }

    public function insertanggotakeluarga($id, Request $request)
    {
        $id_desa = $request->input('id_desa');
        $id_desa = Hashids::decode($id_desa)[0];
        $id_kk   = $request->input('id_kk');
        $id_kk   = Hashids::decode($id_kk)[0];

        $no_urut                    = $request->input('no_urut');
        $nik                        = $request->input('nik');
        $nama_lengkap               = $request->input('nama_lengkap');
        $no_akte_kelahiran          = $request->input('no_akte_kelahiran');
        $hubungan_keluarga          = $request->input('hubungan_keluarga');
        $jenis_kelamin              = $request->input('jenis_kelamin');
        $tempat_lahir               = $request->input('tempat_lahir');
        $tanggal_lahir              = $request->input('tanggal_lahir');
        $tanggal_pencatatan         = $request->input('tanggal_pencatatan');
        $status_kawin               = $request->input('status_kawin');
        $agama                      = $request->input('agama');
        $pendidikan                 = $request->input('pendidikan');
        $pekerjaan                  = $request->input('pekerjaan');
        $cacat_fisik                = $request->input('cacat_fisik');
        $cacat_mental               = $request->input('cacat_mental');
        $record                     = new AnggotaKeluarga;
        $record->id_desa            = $id_desa;
        $record->id_kk              = $id_kk;
        $record->no_urut            = $no_urut;
        $record->nik                = $nik;
        $record->nama_lengkap       = $nama_lengkap;
        $record->no_akte_kelahiran  = $no_akte_kelahiran;
        $record->hubungan_keluarga  = $hubungan_keluarga;
        $record->jenis_kelamin      = $jenis_kelamin;
        $record->tempat_lahir       = $tempat_lahir;
        $record->tanggal_lahir      = tanggalSystem($tanggal_lahir);
        $record->tanggal_pencatatan = tanggalSystem($tanggal_pencatatan);
        $record->status_kawin       = $status_kawin;
        $record->agama              = $agama;
        $record->pendidikan         = $pendidikan;
        $record->pekerjaan          = $pekerjaan;
        $record->cacat_fisik        = $cacat_fisik;
        $record->cacat_mental       = $cacat_mental;
        $record->save();
        $request->session()->flash('notice', "Data Anggota Keluarga Baru Berhasil Disimpan");
        return redirect(URLGroup('ddk/kepala-keluarga/anggota-keluarga/' . $id));
    }

    public function updateAnggotaKeluarga($id_kk, Request $request)
    {
        $id                 = Crypt::decrypt($request->input('id'));
        $no_urut            = $request->input('no_urut');
        $nik                = $request->input('nik');
        $nama_lengkap       = $request->input('nama_lengkap');
        $no_akte_kelahiran  = $request->input('no_akte_kelahiran');
        $hubungan_keluarga  = $request->input('hubungan_keluarga');
        $jenis_kelamin      = $request->input('jenis_kelamin');
        $tempat_lahir       = $request->input('tempat_lahir');
        $tanggal_lahir      = $request->input('tanggal_lahir');
        $tanggal_pencatatan = $request->input('tanggal_pencatatan');
        $status_kawin       = $request->input('status_kawin');
        $agama              = $request->input('agama');
        $pendidikan         = $request->input('pendidikan');
        $pekerjaan          = $request->input('pekerjaan');
        $cacat_fisik        = $request->input('cacat_fisik');
        $cacat_mental       = $request->input('cacat_mental');
        $record             = AnggotaKeluarga::find($id);
        if ($record) {
            $record->no_urut            = $no_urut;
            $record->nik                = $nik;
            $record->nama_lengkap       = $nama_lengkap;
            $record->no_akte_kelahiran  = $no_akte_kelahiran;
            $record->hubungan_keluarga  = $hubungan_keluarga;
            $record->jenis_kelamin      = $jenis_kelamin;
            $record->tempat_lahir       = $tempat_lahir;
            $record->tanggal_lahir      = tanggalSystem($tanggal_lahir);
            $record->tanggal_pencatatan = tanggalSystem($tanggal_pencatatan);
            $record->status_kawin       = $status_kawin;
            $record->agama              = $agama;
            $record->pendidikan         = $pendidikan;
            $record->pekerjaan          = $pekerjaan;
            $record->cacat_fisik        = $cacat_fisik;
            $record->cacat_mental       = $cacat_mental;
            $record->save();
            $request->session()->flash('notice', "Update Anggota Keluarga  Berhasil!");
            return redirect(URLGroup('ddk/kepala-keluarga/anggota-keluarga/' . $id_kk));
        } else {
            throw new HttpException(404);
        }
    }

    //fungsi hapus data AnggotaKeluarga
    public function deleteAnggotaKeluarga($id_kk, Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = AnggotaKeluarga::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Anggota Keluarga Berhasil!");
            return redirect(URLGroup('ddk/kepala-keluarga/anggota-keluarga/' . $id_kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function datakesejahteraankeluarga($id)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $data  = KesejahteraanKeluarga::where('id_kk', $kk->id)->get();
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Kesejahteraan Keluarga");
            return view('desa.ddk.kesejahteraan-keluarga', array("route" => $route, "data" => $data, "kepala_keluarga" => $kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function datakesejahteraankeluargabaru($id)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $cek = KesejahteraanKeluarga::where('id_kk', $kk->id)->count();
            if ($cek) {
                throw new HttpException(404);
            }
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Kesejahteraan Keluarga");
            return view('desa.ddk.new-kesejahteraan-keluarga', array("route" => $route, "kepala_keluarga" => $kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function editdatakesejahteraankeluarga($id)
    {
        $kk = KepalaKeluarga::find(Hashids::decode($id)[0]);
        if ($kk) {
            $cek = KesejahteraanKeluarga::where('id_kk', $kk->id)->count();
            if ($cek == 0) {
                throw new HttpException(404);
            }
            $data  = KesejahteraanKeluarga::where('id_kk', $kk->id)->first();
            $route = array("main" => "ddk", "sub" => "kepala-keluarga", "title" => "DDK - Kesejahteraan Keluarga");
            return view('desa.ddk.edit-kesejahteraan-keluarga', array("route" => $route, "data" => $data, "kepala_keluarga" => $kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function insertdatakesejahteraankeluarga($id, Request $request)
    {
        $id_desa                                  = $request->input('id_desa');
        $id_desa                                  = Hashids::decode($id_desa)[0];
        $id_kk                                    = $request->input('id_kk');
        $id_kk                                    = Hashids::decode($id_kk)[0];
        $jumlah_penghasilan                       = $request->input('jumlah_penghasilan');
        $kepemilikan_rumah                        = $request->input('kepemilikan_rumah');
        $kategori_keluarga                        = $request->input('kategori_keluarga');
        $penerima_raskin                          = $request->input('penerima_raskin');
        $penerima_blt_blsm                        = $request->input('penerima_blt_blsm');
        $penerima_bpjs_jamkesmas_jamkesda         = $request->input('penerima_bpjs_jamkesmas_jamkesda');
        $record                                   = new KesejahteraanKeluarga;
        $record->id_desa                          = $id_desa;
        $record->id_kk                            = $id_kk;
        $record->jumlah_penghasilan               = system_numerik($jumlah_penghasilan);
        $record->kepemilikan_rumah                = $kepemilikan_rumah;
        $record->kategori_keluarga                = $kategori_keluarga;
        $record->penerima_raskin                  = $penerima_raskin;
        $record->penerima_blt_blsm                = $penerima_blt_blsm;
        $record->penerima_bpjs_jamkesmas_jamkesda = $penerima_bpjs_jamkesmas_jamkesda;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('ddk/kepala-keluarga/kesejahteraan-keluarga/' . $id));
    }

    //tambahkan fungsi update data KesejahteraanKeluarga
    public function updatedatakesejahteraankeluarga($id_kk, Request $request)
    {
        $id                               = Crypt::decrypt($request->input('id'));
        $jumlah_penghasilan               = $request->input('jumlah_penghasilan');
        $kepemilikan_rumah                = $request->input('kepemilikan_rumah');
        $kategori_keluarga                = $request->input('kategori_keluarga');
        $penerima_raskin                  = $request->input('penerima_raskin');
        $penerima_blt_blsm                = $request->input('penerima_blt_blsm');
        $penerima_bpjs_jamkesmas_jamkesda = $request->input('penerima_bpjs_jamkesmas_jamkesda');
        $record                           = KesejahteraanKeluarga::find($id);
        if ($record) {
            $record->jumlah_penghasilan               = system_numerik($jumlah_penghasilan);
            $record->kepemilikan_rumah                = $kepemilikan_rumah;
            $record->kategori_keluarga                = $kategori_keluarga;
            $record->penerima_raskin                  = $penerima_raskin;
            $record->penerima_blt_blsm                = $penerima_blt_blsm;
            $record->penerima_bpjs_jamkesmas_jamkesda = $penerima_bpjs_jamkesmas_jamkesda;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('ddk/kepala-keluarga/kesejahteraan-keluarga/'.$id_kk));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data KesejahteraanKeluarga
    public function deletedatakesejahteraankeluarga($id_kk, Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = KesejahteraanKeluarga::find($id);
        if ($record) {
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('ddk/kepala-keluarga/kesejahteraan-keluarga/'.$id_kk));
        } else {
            throw new HttpException(404);
        }
    }

    public function insertKepalaKeluarga(Request $request)
    {
        $id_desa                      = $request->input('id_desa');
        $id_desa                      = Hashids::decode($id_desa)[0];
        $tanggal                      = $request->input('tanggal');
        $nomor_kk                     = $request->input('nomor_kk');
        $nama_kepala_keluarga         = $request->input('nama_kepala_keluarga');
        $alamat                       = $request->input('alamat');
        $rt                           = $request->input('rt');
        $rw                           = $request->input('rw');
        $dusun                        = $request->input('dusun');
        $sumber_data                  = $request->input('sumber_data');
        $alamat_asal                  = $request->input('alamat_asal');
        $record                       = new KepalaKeluarga;
        $record->id_desa              = $id_desa;
        $record->tanggal              = tanggalSystem($tanggal);
        $record->nomor_kk             = $nomor_kk;
        $record->nama_kepala_keluarga = $nama_kepala_keluarga;
        $record->alamat               = $alamat;
        $record->rt                   = $rt;
        $record->rw                   = $rw;
        $record->dusun                = $dusun;
        $record->sumber_data          = $sumber_data;
        $record->alamat_asal          = $alamat_asal;
        $record->save();
        $request->session()->flash('notice', "Data Baru Berhasil Disimpan");
        return redirect(URLGroup('ddk/kepala-keluarga'));
    }

//tambahkan fungsi update data KepalaKeluarga
    public function updateKepalaKeluarga(Request $request)
    {
        $id                   = Crypt::decrypt($request->input('id'));
        $tanggal              = $request->input('tanggal');
        $nomor_kk             = $request->input('nomor_kk');
        $nama_kepala_keluarga = $request->input('nama_kepala_keluarga');
        $alamat               = $request->input('alamat');
        $rt                   = $request->input('rt');
        $rw                   = $request->input('rw');
        $dusun                = $request->input('dusun');
        $sumber_data          = $request->input('sumber_data');
        $alamat_asal          = $request->input('alamat_asal');
        $record               = KepalaKeluarga::find($id);
        if ($record) {
            $record->tanggal              = tanggalSystem($tanggal);
            $record->nomor_kk             = $nomor_kk;
            $record->nama_kepala_keluarga = $nama_kepala_keluarga;
            $record->alamat               = $alamat;
            $record->rt                   = $rt;
            $record->rw                   = $rw;
            $record->dusun                = $dusun;
            $record->sumber_data          = $sumber_data;
            $record->alamat_asal          = $alamat_asal;
            $record->save();
            $request->session()->flash('notice', "Update Data Berhasil!");
            return redirect(URLGroup('ddk/kepala-keluarga'));
        } else {
            throw new HttpException(404);
        }
    }

//fungsi hapus data KepalaKeluarga
    public function deleteKepalaKeluarga(Request $request)
    {
        $id     = Crypt::decrypt($request->input('id'));
        $record = KepalaKeluarga::find($id);
        if ($record) {
            //hapus anggota
            //hapus data kuesioner
            $record->delete();
            $request->session()->flash('notice', "Hapus Data Berhasil!");
            return redirect(URLGroup('ddk/kepala-keluarga'));
        } else {
            throw new HttpException(404);
        }
    }

}
