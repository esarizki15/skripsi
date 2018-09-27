<input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">


<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }} row">
	{!! Form::label('keterangan', 'Deskripsi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::textarea('keterangan',null, ['class'=>'form-control', 'rows'=>'3']) !!}
		{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-md-6 col-md-offset-4">
	{!! Form::submit('Ajukan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
