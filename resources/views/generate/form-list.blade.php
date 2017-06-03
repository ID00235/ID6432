<form action="{{URL::to('generate-list-submit')}}" method="post">
  {{csrf_field()}}
  <br><br>
  <p>Pengaturan Field Yang Ditampilkan</p>
  <hr>
  <label>Nama Route:</label>
  <input type="text"  name="route" value="nama-route" class="form-control">
  <br>
  <hr>
  <table class="table table-striped">
      <tr>
        <td style="width: 85%;">Label</td>
        <td>Tampilkan</td>
      </tr>
    <?php $no=0;?>
    @foreach ($columns as $value)
  <?php
    $type = $value->Type;
    $field = $value->Field;
    $required = $value->Null == "NO" ? "'required'=>true" : "";
    $primary = $value->Key=="PRI" ? 1 : 0;
    if ($type=='date') {
         $func = "tanggalIndo";
         $align = "center";
    }elseif(substr($type,0,7)=='decimal'){
        $func = "desimal2";
        $align = "right";
    }else{
      $func = "-";
      $align = "-";
    }
    if (substr($type,0,4)=='enum'){
      $type="enum";
    }
    $head = explode("_", $field);
    $header = "";
    foreach ($head as $h){
        $header .= ucfirst($h)." ";
    }
  ?>
    @if($primary)
      <input type="hidden" name="primary" value="{{$field}}">
      <input type="hidden" name="table" value="{{$table_name}}">
    @endif
    @if(($field!='created_at' && $field !='updated_at') && !$primary && $field !='id_desa')
      <input type="hidden"  name="align[]" value="{{$align}}">
      <input type="hidden"  name="func[]" value="{{$func}}">
      <input type="hidden"  name="field[]" value="{{$field}}">
      <tr>
        <td><input type="text"  name="label[]" value="{{$header}}" class="form-control"></td>
        <td><input type="checkbox"  name="tampil[]" value="{{$no}}" checked="checked" class="form-control"></td>
      </tr>
      <?php $no++;?>
    @endif
    @endforeach
  </table>
  <button class="pull-right btn btn-primary"> Proses</button>
  </div>
</form>