@extends('vendor.backpack.base.layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li><a href="{{ url('/admin/members') }}">Member</a></li>
					<li class="active">Lengkapi Data Member</li>
				</ul>
					
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Lengkapi Data Member</h2>
					</div>
					
					<div class="panel-body">
						{!! Form::model($member, ['url' => route('members.detail', $member->id),
						'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								{!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::text('name', null, ['class'=>'form-control']) !!}
									{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								{!! Form::label('email', 'Email', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::email('email', null, ['class'=>'form-control']) !!}
									{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
								{!! Form::label('phone', 'No HP', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::text('phone', null, ['class'=>'form-control']) !!}
									{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
								{!! Form::label('address', 'Alamat', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::textarea('address', null, ['class'=>'form-control', 'rows'=>'3']) !!}
									{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-4 col-md-offset-2">
									{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
								</div>
							</div>

							@if(isset($id))
								<input type="hidden" value="{{ $id }}" name="book_id">
							@endif
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection