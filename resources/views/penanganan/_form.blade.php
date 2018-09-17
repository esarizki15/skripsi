<input type="hidden" name="penanganan_id" value="{{ $penanganan->id }}">
<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }} row">
	{!! Form::label('foto', 'Foto', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::file('foto', ['class'=>'form-control col-form-label ']) !!}
		{!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }} row">
	{!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::textarea('deskripsi',null, ['class'=>'form-control', 'rows'=>'3']) !!}
		{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-md-6 col-md-offset-4">
	{!! Form::submit('Ajukan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
