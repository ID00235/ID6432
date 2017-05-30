@extends('layout')
@section("pagetitle","Generate Form")
@section("container")
<div class="row">
	<div class="offset-sm-2 col-md-8">
		<br><br>
		<div class="card">
			<div class="card-header">
    			Generate Form
  			</div>
  			<div class="card-block">
  				{!! Form::open(['url' => 'submit-generate-form']) !!}
          <?php
          $tables = DB::select('SHOW TABLES');
          $array_list = array();
          foreach($tables as $tablex)
          {
                $table  =  $tablex->Tables_in_phpschema;
                array_push(array("$table"=>"$table"),array_list);
          }
          ?>
  				{{Form::bsSelect($array_list,"","table", true)}}
				  {!! Form::close() !!}    			
    		</div>
    	</div>
	</div>
</div>
@endsection
