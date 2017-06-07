<div class="navbar navbar-default yamm navbar-light bg-faded rounded navbar-toggleable-md" style="margin-bottom: 10px;">
    <div class="navbar-header">
        <a href="#" class="navbar-brand">Modul Data Dasar Keluarga</a>
    </div>
    <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item @if($route['sub']=='kepala-keluarga') active @endif">
            <a class="nav-link" href="{{URLGroup('ddk/kepala-keluarga')}}">Kepala Keluarga</a>
          </li>
          <li class="nav-item @if($route['sub']=='Kesejahteraan-keluarga') active @endif">
            <a class="nav-link" href="{{URLGroup('ddk/kesejahteraan-keluarga')}}">Data Kesejahteraan Keluarga</a>
          </li>
          <li class="nav-item @if($route['sub']=='daftar-penduduk') active @endif">
            <a class="nav-link" href="{{URLGroup('ddk/daftar-penduduk')}}">Data Penduduk</a>
          </li>
        </ul>
    </div>
</div>