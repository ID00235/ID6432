<li class="nav-item @if($route['main']=='home') active @endif">
	<a class="nav-link" href="{{URLGroup('home')}}">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item @if($route['main']=='ddk') active @endif">
	<a class="nav-link" href="{{URLGroup('ddk')}}">Data Dasar Keluarga</a>
</li>
<li class="nav-item @if($route['main']=='potensi') active @endif">
	<a class="nav-link" href="{{URLGroup('potensi')}}">Data Potensi</a>
</li>
<li class="nav-item @if($route['main']=='perkembangan') active @endif">
	<a class="nav-link" href="{{URLGroup('perkembangan')}}">Data Perkembangan</a>
</li>