@extends('layout-generate')
@section("pagetitle","Generate Form")
@section("container")
<div class="row">
	<div class="offset-sm-2 col-md-8">
		<br><br>
		<div class="card">
			<div class="card-header">
    			Generate List View (Mode Table)
          <div class="pull-right">
            <a href="{{URL::to('generate-form')}}">Generate Form</a>
            <a href="{{URL::to('generate-route')}}">Generate Route</a>
          </div>
  			</div>
  			<div class="card-block">
  				{!! Form::open(['url' => 'generate-route-result','name'=>'form-generate']) !!}
          <div class="form-group row">
          <label class="control-label col-4">Table</label>
          <div class="col-7">
          <select class="select2" name="table" id="pilih-table" style="width: 100%">
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
				  {!! Form::close() !!}   

          <div id="form-generate">

          </div>
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
  $(function(){
      $("#pilih-table").on('change', function(){
        
          table =  $("form[name=form-generate] select[name=table]").val();
          if(table.length>0){
              $.get('{{URL::to("generate-form-list")}}?table=' + table, function(respon){
                  $("#form-generate").html(respon)
              })
          }
      })
  })
</script>
@endsection
