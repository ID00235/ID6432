<div class="form-group row">
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  <div class="col-3"> 
  {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
  </div>
</div>