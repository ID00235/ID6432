<nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md" style="margin-bottom: 10px;">
      <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item @if($route['sub']=='identitas') active @endif">
            <a class="nav-link" href="{{URLGroup('potensi')}}">Identitas Desa</a>
          </li>
          <li class="nav-item @if($route['sub']=='umum') active @endif">
            <a class="nav-link" href="#">Umum</a>
          </li>
          <li class="nav-item @if($route['sub']=='sda') active @endif">
            <a class="nav-link" href="#">Sumber Daya Alam</a>
          </li>
          <li class="nav-item @if($route['sub']=='sdm') active @endif">
            <a class="nav-link" href="#">Sumber Daya Manusia</a>
          </li>
          <li class="nav-item @if($route['sub']=='kelembagaan') active @endif">
            <a class="nav-link" href="#">Kelembagaan</a>
          </li>
          <li class="nav-item @if($route['sub']=='sarana') active @endif">
            <a class="nav-link" href="#">Sarana dan Prasarana</a>
          </li>

        </ul>
      </div>
</nav>