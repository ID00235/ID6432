<div class="navbar navbar-default yamm navbar-light bg-faded rounded navbar-toggleable-md" style="margin-bottom: 10px;">
    <div class="navbar-header">
        <a href="#" class="navbar-brand">Modul Potensi Desa</a>
    </div>
    <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item @if($route['sub']=='identitas') active @endif">
            <a class="nav-link" href="{{URLGroup('potensi')}}">Identitas Desa</a>
          </li>
          <li class="nav-item @if($route['sub']=='batas-wilayah') active @endif">
            <a class="nav-link" href="{{URLGroup('potensi/batas-wilayah')}}">Batas Wilayah</a>
          </li>
          <li class="dropdown yamm-fw nav-item  @if($route['sub']=='sda') active @endif">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" aria-expanded="false">Sumber Daya Alam 
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <div class="container-menu">
                      <div class="row">
                          <div class="col">
                            <h6 class="dropdown-header">Sumber Daya</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/jenis-lahan')}}">Jenis Lahan <sup style="color: red;">status logika if else</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/defosit-galian')}}">Deposit dan Produksi Bahan Galian <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/ruang-publik')}}">Ruang Publik/Taman <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/potensi-wisata')}}">Potensi Wisata <sup style="color:  #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/apotik-hidup')}}">Apotik Hidup <sup style="color: #1E90FF;">OK</sup></a>
                            <hr>
                             <h6 class="dropdown-header">Tanaman Pangan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan')}}">Kepemilikan Lahan <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-pangan')}}">Hasil dan Luas Produksi <sup style="color: #1E90FF;">OK</sup></a>
                            <hr>
                             <h6 class="dropdown-header">Perkebunan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-kebun')}}">Kepemilikan Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-kebun')}}">Hasil dan Luas Produksi</a>
                          </div>
                          <div class="col">                        
                            <h6 class="dropdown-header">Kehutanan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-hutan')}}">Kepemilikan Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-hutan')}}">Hasil dan Luas Produksi</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kondisi-hutan')}}">Kondisi Hutan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/dampak-pengolahan-hutan')}}">Dampak Pengolahan</a>
                            <hr>
                            <h6 class="dropdown-header">Peternakan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/populasi-ternak')}}">Jenis Populasi Ternak</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/produksi-ternak')}}">Produksi Peternakan</a>
                          </div>
                          <div class="col">
                            <h6 class="dropdown-header">Perikanan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/alat-produksi-ikan-laut')}}">Alat Produksi Budidaya Ikan Laut <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/alat-produksi-ikan-tawar')}}">Alat Produksi Budidaya Ikan Air Tawar <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/jenis-produksi-ikan')}}">Jenis dan Produksi Ikan <sup style="color: #1E90FF;">OK</sup></a>
                            <hr>
                            <h6 class="dropdown-header">Sumber Daya Air</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/potensi-pemanfaatan-air')}}">Potensi dan Pemanfaatan <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/sumber-air-bersih')}}">Sumber Air Bersih <sup style="color: #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kualitas-air-minum')}}">Kualitas Air Minum  <sup style="color:  #1E90FF;">OK</sup></a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/air-panas')}}">Air Panas <sup style="color: #1E90FF;">OK</sup></a>
                          </div>
                      </div>
                  </div>
              </ul>
          </li>
          <li class="dropdown yamm-fw nav-item  @if($route['sub']=='sdm') active @endif">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" aria-expanded="false">Penduduk, Lembaga , Sarana & Prasarana
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <div class="container-menu">
                      <div class="row">
                          <div class="col">
                            <h6 class="dropdown-header">Sumber Daya Manusia</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/jumlah-penduduk')}}">Jumlah Penduduk</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/tingkat-usia')}}">Tingkat Usia</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/tingkat-pendidikan')}}">Tingkat Pendidikan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/mata-pencarian')}}">Mata Pencaharian Pokok <sup>Dari Data DDK</sup></a>
                          </div>
                          <div class="col">      
                            <h6 class="dropdown-header">Lembaga</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-pemerintahan')}}">Lembaga Pemerintahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-masyarakat')}}">Lembaga Kemasyarakatan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-ekonomi')}}">Lembaga Ekonomi</a> 
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-ekonomi')}}">Lembaga Keamanan</a>                 
                          </div>
                          <div class="col">
                            <h6 class="dropdown-header">Sarana Prasarana</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-pemerintahan')}}">Prasarana Air Bersih</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-pemerintahan')}}">Prasarana Sanitasi</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-pemerintahan')}}">Prasarana Kesehatan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-pemerintahan')}}">Prasarana Energi dan Penerangan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sdm/lembaga-ekonomi')}}">Kantor Desa</a> 
                          </div>
                      </div>
                  </div>
              </ul>
          </li>
        </ul>
    </div>
</div>