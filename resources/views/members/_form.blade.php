<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }} row">
	{!! Form::label('jabatan', 'Jabatan', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('jabatan', [''=>'']+App\Jabatan::pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Jabatan']) !!}
		{!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	{!! Form::label('phone', 'Nomor HP', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('phone', null, ['class'=>'form-control']) !!}
		{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} row">
	{!! Form::label('role', 'Role', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('role', ['admin' => 'Admin', 'pimpinan_5R' => 'Pimpinan 5R', 'pengawas_5R' => 'Pengawas 5R', 'petugas_5R' => 'Petugas 5R', 'karyawan' => 'Karyawan'], null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Role']) !!}
		{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }} row">
	{!! Form::label('lokasi', 'Tanggung Jawab Lokasi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('lokasi', [''=>'']+App\Lokasi::pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Lokasi', 'id'=> 'select-gear']) !!}
		{!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('area') ? ' has-error' : '' }} row">
	{!! Form::label('area', 'Tanggung Jawab Area', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('area', [''=>'']+App\Area::pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Area', 'id'=> 'select-gear']) !!}
		{!! $errors->first('area', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
	{!! Form::label('nik', 'NIK', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('nik', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nik', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	{!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::password('password',['class'=>'form-control']) !!}
		{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>