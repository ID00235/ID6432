<div class="form-group row">
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  <div class="col-7"> 
  {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
  </div>
</div>