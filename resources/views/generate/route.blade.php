@extends('layout-generate')
@section("pagetitle","Generate Form")
@section("container")
<div class="row">
	<div class="offset-sm-2 col-md-8">
		<br><br>
		<div class="card">
			<div class="card-header">
    			Generate Route/Controller
          <div class="pull-right">
            <a href="{{URL::to('generate-form')}}">Generate Form</a>
          </div>
  			</div>
  			<div class="card-block">
  				{!! Form::open(['url' => 'generate-route-result','name'=>'form-generate']) !!}
          <div class="form-group row">
          <label class="control-label col-4">Table</label>
          <div class="col-7">
          <select class="select2" name="table" style="width: 100%">
          <option value="">Pilih Table</option>
          <?php
          $tables = DB::select('SHOW TABLES');
          $array_list = array();
          foreach($tables as $tablex)
          {
                $table  =  $tablex->Tables_in_phpschema;
          ?>
            <option value="{{$table}}">{{$table}}</option>
          <?php
          }
          ?>
          </select>
          </div>
          </div>
          {!! Form::bsText("route","",['required'=>true]) !!} 
          <center>
                <button>Generate</button> 
          </center>
				  {!! Form::close() !!}   
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
  $(function(){
      $("#generate").on('click', function(){
        
          table =  $("form[name=form-generate] select[name=table]").val();
          if(table.length>0){
              $("#generate").text('sedang proses..');
              $("#panel-source").html('sedang proses.....');
              jenis = $("form[name=form-generate] input[name=jenis]:checked").val();
              route = $("form[name=form-generate] input[name=route]").val();
              $.get(root_url + '/form/' + jenis +'/' + table + '?route=' + route, function(respon){
                  $("#panel-source").html(respon);
                  $("#generate").text('Generate');
              })
          }
      })
  })
</script>
@endsection
