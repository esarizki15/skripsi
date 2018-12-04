<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }} row">
	{!! Form::label('nama', 'Nama Perusahaan', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6"> 
		{!! Form::text('nama',  null, ['class'=>'form-control ',]) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>
  
<div class="form-group {!! $errors->has('provinsi') ? 'has-error' : '' !!}">
	{!! Form::label('provinsi', 'Provinsi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6">
	{!! Form::text('provinsi', null, 
	['class'=>' form-control', 'placeholder' => 'Pilih Provinsi', 'id'=>'provinsi']) !!}
		{!! $errors->first('provinsi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('kota') ? 'has-error' : '' !!}">
	{!! Form::label('kota', 'Kota', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6">
	{!! Form::text('kota', null, 
	['class'=>' form-control', 'placeholder' => 'Jika kabupaten tuliskan kab. xxx']) !!}
		{!! $errors->first('kota', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('kecamatan') ? 'has-error' : '' !!}">
	{!! Form::label('kecamatan', 'Kecamatan', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6">
	{!! Form::text('kecamatan', null, 
	['class'=>' form-control', 'placeholder' => 'Tuliskan Kecamatan']) !!}
		{!! $errors->first('kecamatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }} row">
	{!! Form::label('detail', 'Detail Lokasi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-sm-6"> 
		{!! Form::text('detail',  null, ['class'=>'form-control ',]) !!}
		{!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-md-6 col-md-offset-4">
	{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>

<script type="text/javascript"></script>