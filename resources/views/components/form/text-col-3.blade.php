<div class="form-group row">
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  {{ Form::text($name, $value, array_merge(['class' => 'col-3 form-control'], $attributes)) }}
</div>