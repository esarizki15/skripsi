<div class="form-group{{ $errors->has('perusahaan_id') ? ' has-error' : '' }} row">
	{!! Form::label('perusahaan_id', 'Pilih Perusahaan', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6"> 
		{!! Form::select('perusahaan_id', [''=>'']+App\Perusahaan::pluck('nama','id')->all(),  null, ['class'=>'form-control, js-selectize ','placeholder' => 'Pilih Perusahaan']) !!}
		{!! $errors->first('perusahaan_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
  
<div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
	{!! Form::label('nama', 'Nama Area', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6">
	{!! Form::text('nama', null, 
	['class'=>' form-control', 'placeholder' => 'Tuliskan Nama Area', 'id'=>'nama']) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-md-6 col-md-offset-4">
	{!! Form::submit('Tambah', ['class'=>'btn btn-primary']) !!}
	</div>
</div>

