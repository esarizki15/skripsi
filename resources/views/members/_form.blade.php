@if ($errors)
	{{ $errors }}
@endif

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
		{!! Form::text('jabatan', null, ['class'=>'form-control']) !!}
		{!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
	{!! Form::label('hp', 'Nomor HP', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('hp', null, ['class'=>'form-control']) !!}
		{!! $errors->first('hp', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} row">
	{!! Form::label('role', 'Role', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		@if (Request::route()->getName() != 'member.edit')
		{!! Form::select('role[]', [''=>'']+App\Role::pluck('nama','id')->all(), null,['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Role', 'multiple'=>'multiple', 'id'=>'role']) !!}
		{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
		@else
		@php
			$default = [];
			foreach ($member->roles as $role) {
				array_push($default, $role->id);
			}
		@endphp
		{!! Form::select('role[]', [''=>'']+App\Role::pluck('nama','id')->all(), $default,['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Role', 'multiple'=>'multiple', 'id'=>'role']) !!}
		{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
		@endif
	</div>
</div>


<div id="lokasi" class="hidden form-group{{ $errors->has('lokasi') ? ' has-error' : '' }} row">
	{!! Form::label('lokasi', 'Tanggung Jawab Lokasi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		@if (Request::route()->getName() != 'member.edit')
		{!! Form::select('lokasi[]', [''=>'']+App\Tempat::whereNull('tempat_id')->pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Lokasi']) !!}
		{!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
		@else
		@php
			$default = [];
			foreach ($member->tempats as $tempat) {
				array_push($default, $tempat->id);
			}
		@endphp
		{!! Form::select('lokasi[]', [''=>'']+App\Tempat::where('tempat_id', '!=', null)->pluck('nama','id')->all(), $default,['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Lokasi', 'multiple'=>'multiple', 'id'=>'lokasi']) !!}
		{!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
		@endif

	</div>
</div>

<div id="area" class="hidden form-group{{ $errors->has('area') ? ' has-error' : '' }} row">
	{!! Form::label('area', 'Tanggung Jawab Area', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		@if (Request::route()->getName() != 'member.edit')
		{!! Form::select('area[]', [''=>'']+App\Tempat::whereNull('tempat_id')->pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Area']) !!}
		{!! $errors->first('area', '<p class="help-block">:message</p>') !!}
		@else
		@php
			$default = [];
			foreach ($member->tempats as $tempat) {
				array_push($default, $tempat->id);
			}
		@endphp
		{!! Form::select('area[]', [''=>'']+App\Tempat::whereNull('tempat_id')->pluck('nama','id')->all(), $default,['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Area', 'multiple'=>'multiple', 'id'=>'area']) !!}
		{!! $errors->first('area', '<p class="help-block">:message</p>') !!}
		@endif
	</div>
</div>


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	{!! Form::label('email', 'e-mail', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
		{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
	</div>
</div>

@if (Request::route()->getName() != 'member.edit')
	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		{!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::password('password',['class'=>'form-control']) !!}
			{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
@endif

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>

@section('before_scripts')
<script type="text/javascript">
$(document).ready(function() {

      $( "#role" ).change(function () {

	    var str = [];
	    $( "#role option:selected" ).each(function() {
	      str += $( this ).text();

	      if (str.includes("Petugas 5R")) {
	    	
	    $("#lokasi").removeClass("hidden").fadeIn();
	    }else {
	    	$("#lokasi").hide();
	    }


	    if (str.includes("Pengawas 5R")) {
	    	
	    $("#area").removeClass("hidden").fadeIn();
	    }else{
	    	$("#area").hide();
	    }

	      console.log(str)
	    });

	    
	  })
	  .change();




});
</script>
@endsection