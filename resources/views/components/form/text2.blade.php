<div class="form-group row">
  @if(isset($attributes["required"]))
  {{ Form::label($name, null, ['class' => 'col-12 control-label', 'required'=>'true']) }}
  @else
  {{ Form::label($name, null, ['class' => 'col-12 control-label']) }}
  @endif
  <div class="col-12"> 
  {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
  @if(isset($attributes["help"]))
  <small class="text-muted">{{$attributes["help"]}}</small>
  @endif
  </div>
</div>