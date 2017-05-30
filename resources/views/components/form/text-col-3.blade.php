<div class="form-group row">
  @if(isset($attributes["required"]))
  {{ Form::label($name, null, ['class' => 'col-4 control-label', 'required'=>'true']) }}
  @else
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  @endif
  <div class="col-3"> 
  {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
  </div>
</div>