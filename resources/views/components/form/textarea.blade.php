<div class="form-group row">
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  {{ Form::textarea($name, $value, array_merge(['class' => 'col-7 form-control'], $attributes)) }}
</div>