<div class="navbar navbar-default yamm navbar-light bg-faded rounded navbar-toggleable-md" style="margin-bottom: 10px;">
    <div class="navbar-header">
        <a href="#" class="navbar-brand">Potensi</a>
    </div>
    <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item @if($route['sub']=='identitas') active @endif">
            <a class="nav-link" href="{{URLGroup('potensi')}}">Identitas Desa</a>
          </li>
          <li class="nav-item @if($route['sub']=='batas-wilayah') active @endif">
            <a class="nav-link" href="{{URLGroup('potensi/batas-wilayah')}}">Batas Wilayah</a>
          </li>
          <li class="dropdown yamm-fw nav-item">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" aria-expanded="false">Sumber Daya Alam 
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <div class="container-menu">
                      <div class="row">
                          <div class="col">
                            <h6 class="dropdown-header">Sumber Daya</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/jenis-lahan')}}">Jenis Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/iklim')}}">Iklim, Tanah dan Erosi</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/topografi')}}">Topografi</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/defosit-galian')}}">Deposit dan Produksi Bahan Galian</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kualitas-udara')}}">Kualitas Udara</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/ruang-publik')}}">Ruang Publik/Taman</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/potensi-wisata')}}">Potensi Wisata</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/apotik-hidup')}}">Apotik Hidup</a>
                            <hr>
                             <h6 class="dropdown-header">Tanaman Pangan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan')}}">Kepemilikan Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-pangan')}}">Hasil dan Luas Produksi</a>
                          </div>
                          <div class="col">                        
                            <h6 class="dropdown-header">Tanaman Buah-Buahan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-buah')}}">Kepemilikan Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-buah')}}">Hasil dan Luas Produksi</a>
                            <hr>
                            <h6 class="dropdown-header">Perkebunan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-kebun')}}">Kepemilikan Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-kebun')}}">Hasil dan Luas Produksi</a>
                            <hr>
                            <h6 class="dropdown-header">Kehutanan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kepemilikan-lahan-hutan')}}">Kepemilikan Lahan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/hasil-hutan')}}">Hasil dan Luas Produksi</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kondisi-hutan')}}">Kondisi Hutan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/dampak-pengolahan-hutan')}}">Dampak Pengolahan</a>
                          </div>
                          <div class="col">
                            <h6 class="dropdown-header">Peternakan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/jenis-populasi-ternak')}}">Jenis Populasi Ternak</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/produksi-ternak')}}">Produksi Peternakan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/lahan-pakan-ternak')}}">Lahan dan Pakan Ternak</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/pengolahan-hasil-ternak')}}">Pengolahan Hasil Ternak</a>
                            <hr>
                            <h6 class="dropdown-header">Perikanan</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/alat-produksi-ikan-laut')}}">Alat Produksi Budidaya Ikan Laut</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/alat-produksi-ikan-tawar')}}">Alat Produksi Budidaya Ikan Air Tawar</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/jenis-produksi-ikan')}}">Jenis dan Produksi Ikan</a>
                            <hr>
                            <h6 class="dropdown-header">Sumber Daya Air</h6>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/potensi-pemanfaatan-air')}}">Potensi dan Pemanfaatan</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/sumber-air-bersih')}}">Sumber Air Bersih</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/kualitas-air-minum')}}">Kualitas Air Minum</a>
                            <a class="dropdown-item" href="{{URLGroup('potensi/sda/air-panas')}}">Air Panas</a>
                          </div>
                      </div>
                  </div>
              </ul>
          </li>
        </ul>
    </div>
</div>