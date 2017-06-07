<div class="navbar navbar-default yamm navbar-light bg-faded rounded navbar-toggleable-md" style="margin-bottom: 10px;">
    <div class="navbar-header">
        <a href="#" class="navbar-brand">Modul Perkembangan</a>
    </div>
    <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item @if($route['sub']=='kepala-keluarga') active @endif">
            <a class="nav-link" href="{{URLGroup('perkembangan/Kesejahteraan-desa')}}">Kesejahteraan Desa</a>
          </li>
          <li class="nav-item @if($route['sub']=='daftar-penduduk') active @endif">
            <a class="nav-link" href="{{URLGroup('perkembangan/Kesejahteraan-desa')}}">Aset Perumahan/a>
          </li>
        </ul>
    </div>
</div>