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
          <?php
          $table = Request::input('table');
          $route = Request::input('route');
          $tb = explode("_",$table);
          $columns = DB::select('show columns from '.$table);
          $model ="";
          foreach($tb as $t){
            $model .= ucfirst($t);
          }
          $rt = explode("/",$route);
          $controller = ucfirst($rt[0]).$model.'Controller';
          ?>
          <p>&nbsp;</p>
          <code>
              //ROUTE {{$table}} <br>
              Route::group(['prefix' =>'{{$route}}'], function(){<br>
                  Route::get('/', "Desa\{{$controller}}@list{{$model}}"); <br>
                  Route::get('/edit/{id}', "Desa\{{$controller}}@edit{{$model}}");   <br>
                  Route::post('/insert', "Desa\{{$controller}}@insert{{$model}}");   <br>
                  Route::post('/update', "Desa\{{$controller}}@update{{$model}}");   <br>
                  Route::post('/delete', "Desa\{{$controller}}@delete{{$model}}");   <br>
              });<br>
          </code>
          <p>&nbsp;</p>
          //buat model dengan nama {{$model}}<br>
          <code>
            @foreach ($columns as $value)
            <?php
            $type = $value->Type;
            $field = $value->Field;
            $required = $value->Null == "NO" ? 1 : 0;
            $primary = $value->Key=="PRI" ? 1 : 0;
            ?>  
            @if($primary)
              <?php $field_kunci = $field;?>
            @endif
            @endforeach

            &#60;{{"?php"}}<br>
            namespace App\Models;<br>
            use Illuminate\Database\Eloquent\Model;<br>
            class {{$model}} extends Model<br>
            {<br>
                protected $primaryKey='{{$field_kunci}}';<br>
                protected $table = '{{$table}}';<br>
            }<br>
          </code>
          <hr>
            //buat controller dengan nama <code>{{$controller}}</code> <br>
            <code>
            //jagnan lupa tambahkan use App\Models\{{$model}} pada bagian atas conttroller
          </code>
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
  $(function(){
      var $validator = $("form[name=form-generate]").validate({
      ignore:[],
      rules: {
      table: {required:true},
      route: {required:true},
      },
      messages: {
      },
      submitHandler: function(form) {
      form.submit();
      }
      });
  })
</script>
@endsection

